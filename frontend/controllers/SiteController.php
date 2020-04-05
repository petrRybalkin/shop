<?php
namespace frontend\controllers;

use backend\models\Settings;
use common\models\Order;
use common\models\Page;
use common\models\Delivery;
use common\models\Product;
use common\models\Profile;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\NotFoundHttpException;
use yz\shoppingcart\ShoppingCart;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Благодарим Вас за обращение к нам. Мы ответим вам как можно скорее.');
            } else {
                Yii::$app->session->setFlash('error', 'Произошла ошибка в процессе отправки сообщения.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->redirect(['success-signup']);
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

     public function actionSuccessSignup()
    {
        return $this->render('success-signup');
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Проверьте свою электронную почту для дальнейших инструкций.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'К сожалению, мы не можем сбросить пароль для указанного адреса электронной почты.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'Новый пароль сохранен');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Ваше email был подтвержден!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'К сожалению, мы не можем подтвердить ваш аккаунт.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Проверьте свою электронную почту для дальнейших инструкций.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'К сожалению, мы не можем переслать подтверждающее письмо на указанный адрес электронной почты.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionYiiGit()
    {
        $old_path = getcwd();
        chdir(dirname(Yii::getAlias('@app')));
        $output = shell_exec('./app.sh');
        chdir($old_path);

        return Html::tag('textarea', $output);
    }

    public function actionBuy($id, $amount = 1)
    {
        $product = Product::findOne($id);
        if (!$product || $amount < 1) {
            throw new NotFoundHttpException();
        }

        /** @var ShoppingCart $cart */
        $cart = Yii::$app->cart;
        $cart->put($product, $amount);

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionSub($id, $amount = 1)
    {
        $product = Product::findOne($id);
        if (!$product || $amount < 1) {
            throw new NotFoundHttpException();
        }

        /** @var ShoppingCart $cart */
        $cart = Yii::$app->cart;
        $position = $cart->getPositionById($product->getId());
        if ($position->getQuantity() <= $amount) {
            $cart->removeById($product->getId());
        } else {
            $cart->update($product, $position->getQuantity() - $amount);
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionRemove($id)
    {
        $product = Product::findOne($id);
        if (!$product) {
            throw new NotFoundHttpException();
        }

        /** @var ShoppingCart $cart */
        $cart = Yii::$app->cart;
        $cart->removeById($product->getId());

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionCart()
    {
        /** @var ShoppingCart $cart */
        $cart = Yii::$app->cart;

        $model = new Order();

        /** @var Profile $profile */
        $profile = ArrayHelper::getValue(Yii::$app->user, 'identity.profile') ?: new Profile();
        if (!$profile->isNewRecord) {
            $model->name = $profile->name;
            $model->phone = $profile->phone;
            $model->city = $profile->city;
            $model->address = $profile->address;
        }
        $model->price = $cart->getCost();

        $load = $model->load(Yii::$app->request->post());
        $model->delivery = Settings::calcDeliveryPrice();
        if ($load && $model->save()) {
            $model->saveItems();
            $cart->removeAll();
            $this->render('send-to-telegram', ['model' => $model]);
            return $this->redirect(['success']);
        }

        return $this->render('cart', [
            'model' => $model,
            'cart' => $cart,
        ]);
    }

    public function actionSendToTelegram(){
        /** @var ShoppingCart $cart */
        $cart = Yii::$app->cart;

        $model = new Order();

        /** @var Profile $profile */
        $profile = ArrayHelper::getValue(Yii::$app->user, 'identity.profile') ?: new Profile();
        if (!$profile->isNewRecord) {
            $model->name = $profile->name;
            $model->phone = $profile->phone;
            $model->city = $profile->city;
            $model->address = $profile->address;
            $model->description = $this->description;
        }
        $model->price = $cart->getCost();
        return $this->render('send-to-telegram', [
            'model' => $model,
            'cart' => $cart,
        ]);
    }

    public function actionSuccess()
    {
        return $this->render('success');
    }

    public function actionPage($slug)
    {
        if (!$model = Page::findBySlug($slug)) {
            throw new NotFoundHttpException();
        }

        return $this->render('page', [
            'model' => $model,
        ]);
    }

    public function actionDelivery($slug)
    {
        if (!$model = Delivery::findBySlug($slug)) {
            throw new NotFoundHttpException();
        }

        return $this->render('delivery', [
            'model' => $model,
        ]);
    }
}
