<?php


namespace app\controllers;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Exception\AMQPProtocolChannelException;
use PhpAmqpLib\Message\AMQPMessage;


class SiteController extends Controller
{
    public function actionIndex()
    {

        $images = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
        echo $this->render('index', ['images' => $images, 'className' => $this->getClassName()]);
    }

    public function actionPizza()
    {
        $pizza = '';
        if (isset($_POST['pizza'])) {
            $pizza = $_POST['pizza'];

            try {
                // соединяемся с RabbitMQ
                $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
                // Создаем канал общения с очередью
                $channel = $connection->channel();
                $channel->queue_declare('pizza', false, true, false, false);
                // создаем сообщение
                $msg = new AMQPMessage($pizza);
                // размещаем сообщение в очереди
                $channel->basic_publish($msg, '', 'pizza');
                // закрываем соединения
                $channel->close();
                $connection->close();
            } catch (AMQPProtocolChannelException $e) {
                echo $e->getMessage();
            } catch (\AMQPException $e) {
                echo $e->getMessage();
            }


        }
        echo $this->render('pizza', ['pizza' => $pizza, 'className' => $this->getClassName()]);
    }

    public function actionAdditional()
    {

    }

    public function getClassName()
    {
        return 'site';
    }
}