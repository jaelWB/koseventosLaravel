<div style="width: 600px; margin:10px auto; border:1px solid #ccc;font-family: Arial, Helvetica, sans-serif;background: #F7F7F7">
    <div style="background: #3b3b3b;color:rgb(221, 221, 221); ">
        <h4 style="margin: 0;padding:10px">{{ $subject }}</h4>
    </div>

    <div style="text-align: center">
        <img src="https://ekosnegocios.com/img/EkosLogo.png">
    </div>

    <div style="padding: 10px; background: #fff;padding-bottom:20px">
    
        <h4>Hola {{$user->name}},</h4>
        <p style="font-size: 15px;color:#010101">Estos son tus accesos para ingresar a los eventos en vivo:</p>
        <p style="font-size: 15px;color:#010101">
            <ul>
                <li>Usuario/ Email: {{ $user->email }}</li>
                <li>Contraseña: {{ $password }}</li>
                <li>URL: <a href="https://ekoseventos.com/envivo">ekoseventos.com/envivo</a></li>
            </ul>
        </p>
 
        <p style="font-size: 13px; margin:30px 0 0; text-align:center"><i>Nota: Este mensaje fue generado automáticamente por el sistema, no respondas al remitente.</i></p>
    </div>

</div>