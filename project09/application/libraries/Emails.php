<?php 
// ================================================================================
/*  library para enviar emails através do PHPMailer
    NOTAS:
    1. O PHPMailer tem que estar na pasta [base]/assets/phpmailer
    2. Definir corretamente as configurações de email
    3. $destinatarios é um array com os contactos de email dos destinatários
    4. O método enviar() retorna TRUE (enviado) ou FALSE (aconteceu um erro no envio)
*/
// ================================================================================
defined('BASEPATH') OR exit('URL inválida.');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Emails{

    // -------------------------------------------
    //configurações //ALTERAR
    public $MAIL_HOST       = 'leandro47.com';
    public $MAIL_PORT       = 587;
    public $MAIL_USERNAME   = 'contato@leandro47.com';
    public $MAIL_PASSWORD   = ',,]5NPC}WWX0';
    public $MAIL_FROM       = 'contato@leandro47.com';
    public $MAIL_REMETENTE  = 'Leandro da Silva';
    public $DEBUG_MODE      = 0;
    public $DESTINATARIO    = 'leandrosilva47@live.com';

    // ============================================================================
    public function enviar($assunto, $mensagem, $destinatarios = []){
        require 'assets/phpmailer/src/Exception.php';
        require 'assets/phpmailer/src/PHPMailer.php';
        require 'assets/phpmailer/src/SMTP.php';
         
        $mail = new PHPMailer(true);                                // Passing `true` enables exceptions
        $enviada = false;
        try {
            //Configurações do servidor
            $mail->SMTPDebug = $this->DEBUG_MODE;                   // Enable verbose debug output
            $mail->isSMTP();                                        // Set mailer to use SMTP
            $mail->Host = $this->MAIL_HOST;                         // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                                 // Enable SMTP authentication
            $mail->Username = $this->MAIL_USERNAME;                 // SMTP username
            $mail->Password = $this->MAIL_PASSWORD;                 // SMTP password
            $mail->SMTPSecure = 'tls';                              // Enable TLS encryption, `ssl` also accepted
            $mail->Port = $this->MAIL_PORT;                         // porta TCP
            $mail->CharSet = "UTF-8";

            //Contas
            $mail->setFrom($this->MAIL_FROM, $this->MAIL_REMETENTE);

            //adiciona o destinatário principal
            $mail->addAddress($this->DESTINATARIO); 
                      
            //adiciona destinatários adicionais, se estiverem indicados
            foreach ($destinatarios as $destinatario) {
                $mail->addAddress($destinatario);                   // Adicionar contas (de e para)
            }            

            //Conteudo
            $mail->isHTML(true);                                    // Definir o formato como HTML
            $mail->Subject = $assunto;
            $mail->Body    = $mensagem;

            $enviada = $mail->send();
            
        } catch (Exception $e) {
            $enviada = false;
        }
        return $enviada;
    }
}

?>