<!--DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" -->
<html xmlns="http://www.w3.org/1999/xhtml" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">

<head>
  <meta name="viewport" content="width=device-width" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Bienvenido</title>


  <style type="text/css">
    img {
    max-width: 100%;
    }
    body {
    -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em;
    }
    body {
    background-color: #f6f6f6;
    }
    @media only screen and (max-width: 640px) {
      body {
        padding: 0 !important;
      }
      h1 {
        font-weight: 800 !important; margin: 20px 0 5px !important;
      }
      h2 {
        font-weight: 800 !important; margin: 20px 0 5px !important;
      }
      h3 {
        font-weight: 800 !important; margin: 20px 0 5px !important;
      }
      h4 {
        font-weight: 800 !important; margin: 20px 0 5px !important;
      }
      h1 {
        font-size: 22px !important;
      }
      h2 {
        font-size: 18px !important;
      }
      h3 {
        font-size: 16px !important;
      }
      .container {
        padding: 0 !important; width: 100% !important;
      }
      .content {
        padding: 0 !important;
      }
      .content-wrap {
        padding: 10px !important;
      }
      .invoice {
        width: 100% !important;
      }
    }
  </style>
</head>

<body itemscope itemtype="http://schema.org/EmailMessage" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f6f6f6; margin: 0;">

<?php

/*
$date = date('d-m-Y');
$users_id = getValor('users_id', 'users_email', $email);
$nombre = getValor('users_name', 'users_email', $email);

$token = generaTokenPass($users_id);
*/

$date = date('d-m-Y');
$url = "https://websparadise.com/photomenu#wpcf7-f2158-p2144-o1";

$asunto = 'Sistema PhotoMenu - Pendiente de Pago';
//$cuerpo = "Hola $nombre: <br /><br />Se ha solicitado un reinicio de contrase&ntilde;a. <br/><br/>Para restaurar la contrase&ntilde;a, visita la siguiente direcci&oacute;n: <a href='$url'>Cambiar Password</a>";

$cuerpo = " 
<table class='body-wrap' style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;' bgcolor='#f6f6f6'>
<tr style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;'>
  <td style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;' valign='top'></td>
  <td class='container' width='600' style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;'
  valign='top'>
    <div class='content' style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;'>
      <table class='main' width='100%' cellpadding='0' cellspacing='0' style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;'
      bgcolor='#fff'>
        <tr style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;'>
          <td class='alert alert-warning' style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #fff; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: #60b5d7; margin: 0; padding: 20px;'
          align='center' bgcolor='#FF9F00' valign='top'>
            <img src='https://websparadise.com/wp-content/uploads/2019/02/logoWbsP-100x100.png' />
          </td>
        </tr>
        <tr style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;'>
          <td class='content-wrap' style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;' valign='top'>
            <table width='100%' cellpadding='0' cellspacing='0' style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;'>
              <tr style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;'>
                <td class='content-block' style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;' valign='top'>
                Querido miembro <strong>$username</strong> de PhotoMenu.</br>
                Su periodo de pago ha caducado. 
                </td>
              </tr>
              <tr style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;'>
                <td class='content-block' style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;' valign='top'>
                <h3>Si se trata de un error y ya ha actualizado el pago. No es necesario ninguna acci&oacute;n por su parte.</h3><br />
                <hr>
                Se le env&iacute;a este mail como aviso de que su periodo de pago de PhotoMenu, est&aacute; a punto de caducar o ya ha caducado.</br>
                Por favor, p&oacute;ngase en contacto lo antes posible para actualizar su m&eacute;todo de pago.<br>
                De lo contrario su cuenta y su sistema quedar&aacute;n bloqueados.
                </td>
              </tr>
              <tr style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;'>
               <td class='content-block' style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px; text-align:center;' valign='top'>
                  <a href='$url' class='btn-primary' style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #348eda; margin: 0; border-color: #348eda; border-style: solid; border-width: 10px 20px;'>Contactar</a>
                </td>
              </tr>
              <tr style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; text-align:center;'>
                <td class='content-block' style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;' valign='top'>
                  <hr>
                  <p style='font-size:10px;'>Un cordial saludo del equipo de PHOTOMENU.</p>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      <div class='footer' style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;'>
        <table width='100%' style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;'>
          <tr style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;'>
            <td class='aligncenter content-block' style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;' align='center'
            valign='top'>
              Sistema de registros creado por 
              <a href=\"https://www.websparadise.com\" style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;'>websparadise.com</a>.
              <br />Copyright $date  WEBSPARADISE. Todos los derechos reservados.</td>
          </tr>
        </table>
      </div>
    </div>
  </td>
  <td style='font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;' valign='top'></td>
</tr>
</table>
"
?>
</body>
</html>