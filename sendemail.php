<?php 
    require 'vendor/autoload.php';

    class SendEmail {
        //la función estatica no requiere instanciar la clase.
        public static function SendMail ($para, $asunto, $contenido) {
            $key = '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';
            
            //instancio la clase mail de sendgrid
            $email = new \SendGrid\Mail\Mail();
            //seteo el remitente
            $email->setFrom('npatino@estebanecheverria.gob.ar', 'Nicolas Patiño');
            //seteo el asunto
            $email->setSubject($asunto);
            //seteo el destinatario
            $email->addTo($para);
            //seteo el contenido 
            $email->addContent('text/plain', $contenido);
            //$email->addContent('text/html', $contenido);

            //instancio un nuevo objeto de sendgrid
            $sendgrid = new \SendGrid($key);

            try {
                $respuesta = $sendgrid->send($email); 
                return $respuesta; //succsess 202
            } catch (Exception $e) {
                echo 'Email error: '. $e->getMessage();
                return false;
            }
        }
    }

?>