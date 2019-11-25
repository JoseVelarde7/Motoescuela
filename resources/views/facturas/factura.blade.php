<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Motoescuela Factura</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('css/metro.css')}}" rel="stylesheet">
    <link href="{{asset('css/template.css')}}" rel="stylesheet">
    <style>
        .modal-content{
            background: #FFFFFF;
            height: 100%;
        }
        .tituloHead{
            font-size: 18px;
            display: inline;
        }
        @media print {
            .impre {display:none}
        }
    </style>
</head>
<body>
<div style="float: right">
    <a href="{{ url('/facturas')}}" class="button danger impre">Regresar</a>
</div>
<div id="container">
    <div class="left-stripes">
        <div class="circle c-upper"></div>
        <div class="circle c-lower"></div>
    </div>

    <div class="right-invoice">
        <section id="memo">
            <div class="company-info">
                <div id="">1ra Motoescuela Dakar</div>
                <br>
                <span>DE: Jose Adolfo San Roman Molina</span><br>
                <span>CASA MATRIZ</span><br>
                <span>Av. 14 de septiembre No 5190</span>
                <span>Zona Obrajes</span>
                <span>Telf: 2787330 - 71522201</span><br>
                <span>La Paz - Bolivia</span>
            </div>

            <div class="logo">
                <img src="{{asset('img/logo.png')}}" alt="">
            </div>
        </section>
        <div style="font-size:20px;" align="center">
            <span>La Paz {{$factura->factura_fecha}}</span>
        </div>
        <section id="invoice-title-number">
            <div id="title">Recibo # {{$factura->factura_numero}}</div>
        </section>
        <section id="client-info">
            <div class="client-name">
                <span>Señor(es): {{$factura->factura_razon}}</span>
            </div>
            <div class="client-name">
                <span>NIT/C.I: {{$factura->factura_nit}}</span>
            </div>
        </section>
        <div class="clearfix"></div>
        </section>
        <div class="clearfix"></div>
        <section id="items">
            <table cellpadding="0" cellspacing="0">
                <thead>
                    <th>#</th>
                    <th>CANTIDAD</th>
                    <th>DETALLE</th>
                    <th>PRECIO UNITARIO</th>
                    <th>SUBTOTAL</th>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>{{$factura->factura_cantidad}}</td>
                        <td>{{$factura->factura_concepto}}</td>
                        <td>{{$factura->factura_monto}}</td>
                        <td>{{($factura->factura_cantidad)*($factura->factura_monto)}}</td>
                    </tr>
                </tbody>
            </table>
        </section><br>
        <section id="sums">
            <table cellpadding="0" cellspacing="0">
                <tr class="amount-total">
                    <td colspan="2">Bs. {{($factura->factura_cantidad)*($factura->factura_monto)}}</td>
                </tr>
            </table>
        </section>
        <div style="display:inline;"><?php
            $V=new EnLetras();
            $con_letra=strtoupper($V->ValorEnLetras($factura->factura_cantidad*$factura->factura_monto," "));
            echo "<b>".$con_letra."</b>";
            ?>
        </div>
        <div class="clearfix"></div><br>
        <div id="demo" style="display:inline-block; float: right;"></div>
        <div>"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS EL USO ILICITO DE ESTA SERA SANCIONADO DE ACUERDO A LEY"</div>
        <p>LEY Nro 453: El proveedor deberá dar cumplimiento a las condiciones ofertadas.</p>
    </div>
</div>
</body>
</html>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery.qrcode.min.js')}}"></script>
<?php
class EnLetras {
    var $Void = "";
    var $SP = " ";
    var $Dot = ".";
    var $Zero = "0";
    var $Neg = "Menos";

    function ValorEnLetras($x, $Moneda )
    {
        $s="";
        $Ent="";
        $Frc="";
        $Signo="";

        if(floatVal($x) < 0)
            $Signo = $this->Neg . " ";
        else
            $Signo = "";

        if(intval(number_format($x,2,'.','') )!=$x) //<- averiguar si tiene decimales
            $s = number_format($x,2,'.','');
        else
            $s = number_format($x,2,'.','');

        $Pto = strpos($s, $this->Dot);

        if ($Pto === false)
        {
            $Ent = $s;
            $Frc = $this->Void;
        }
        else
        {
            $Ent = substr($s, 0, $Pto );
            $Frc =  substr($s, $Pto+1);
        }

        if($Ent == $this->Zero || $Ent == $this->Void)
            $s = "Cero ";
        elseif( strlen($Ent) > 7)
        {
            $s = $this->SubValLetra(intval( substr($Ent, 0,  strlen($Ent) - 6))) .
                "Millones " . $this->SubValLetra(intval(substr($Ent,-6, 6)));
        }
        else
        {
            $s = $this->SubValLetra(intval($Ent));
        }

        if (substr($s,-9, 9) == "Millones " || substr($s,-7, 7) == "Millón ")
            $s = $s . "de ";

        $s = $s . $Moneda;

        if($Frc != $this->Void)
        {
            $s = $s . " " . $Frc. "/100";
            //$s = $s . " " . $Frc . "/100";
        }
        $letrass=$Signo . $s . " Bolivianos.";
        return ($Signo . $s . " Bolivianos.");

    }


    function SubValLetra($numero)
    {
        $Ptr="";
        $n=0;
        $i=0;
        $x ="";
        $Rtn ="";
        $Tem ="";

        $x = trim("$numero");
        $n = strlen($x);

        $Tem = $this->Void;
        $i = $n;

        while( $i > 0)
        {
            $Tem = $this->Parte(intval(substr($x, $n - $i, 1).
                str_repeat($this->Zero, $i - 1 )));
            If( $Tem != "Cero" )
                $Rtn .= $Tem . $this->SP;
            $i = $i - 1;
        }


        //--------------------- GoSub FiltroMil ------------------------------
        $Rtn=str_replace(" Mil Mil", " Un Mil", $Rtn );
        while(1)
        {
            $Ptr = strpos($Rtn, "Mil ");
            If(!($Ptr===false))
            {
                If(! (strpos($Rtn, "Mil ",$Ptr + 1) === false ))
                    $this->ReplaceStringFrom($Rtn, "Mil ", "", $Ptr);
                Else
                    break;
            }
            else break;
        }

        //--------------------- GoSub FiltroCiento ------------------------------
        $Ptr = -1;
        do{
            $Ptr = strpos($Rtn, "Cien ", $Ptr+1);
            if(!($Ptr===false))
            {
                $Tem = substr($Rtn, $Ptr + 5 ,1);
                if( $Tem == "M" || $Tem == $this->Void)
                    ;
                else
                    $this->ReplaceStringFrom($Rtn, "Cien", "Ciento", $Ptr);
            }
        }while(!($Ptr === false));

        //--------------------- FiltroEspeciales ------------------------------
        $Rtn=str_replace("Diez Un", "Once", $Rtn );
        $Rtn=str_replace("Diez Dos", "Doce", $Rtn );
        $Rtn=str_replace("Diez Tres", "Trece", $Rtn );
        $Rtn=str_replace("Diez Cuatro", "Catorce", $Rtn );
        $Rtn=str_replace("Diez Cinco", "Quince", $Rtn );
        $Rtn=str_replace("Diez Seis", "Dieciseis", $Rtn );
        $Rtn=str_replace("Diez Siete", "Diecisiete", $Rtn );
        $Rtn=str_replace("Diez Ocho", "Dieciocho", $Rtn );
        $Rtn=str_replace("Diez Nueve", "Diecinueve", $Rtn );
        $Rtn=str_replace("Veinte Un", "Veintiun", $Rtn );
        $Rtn=str_replace("Veinte Dos", "Veintidos", $Rtn );
        $Rtn=str_replace("Veinte Tres", "Veintitres", $Rtn );
        $Rtn=str_replace("Veinte Cuatro", "Veinticuatro", $Rtn );
        $Rtn=str_replace("Veinte Cinco", "Veinticinco", $Rtn );
        $Rtn=str_replace("Veinte Seis", "Veintiseís", $Rtn );
        $Rtn=str_replace("Veinte Siete", "Veintisiete", $Rtn );
        $Rtn=str_replace("Veinte Ocho", "Veintiocho", $Rtn );
        $Rtn=str_replace("Veinte Nueve", "Veintinueve", $Rtn );

        //--------------------- FiltroUn ------------------------------
        If(substr($Rtn,0,1) == "M") $Rtn = "Un " . $Rtn;
        //--------------------- Adicionar Y ------------------------------
        for($i=65; $i<=88; $i++)
        {
            If($i != 77)
                $Rtn=str_replace("a " . Chr($i), "* y " . Chr($i), $Rtn);
        }
        $Rtn=str_replace("*", "a" , $Rtn);
        return($Rtn);
    }


    function ReplaceStringFrom(&$x, $OldWrd, $NewWrd, $Ptr)
    {
        $x = substr($x, 0, $Ptr)  . $NewWrd . substr($x, strlen($OldWrd) + $Ptr);
    }


    function Parte($x)
    {
        $Rtn='';
        $t='';
        $i='';
        Do
        {
            switch($x)
            {
                Case 0:  $t = "Cero";break;
                Case 1:  $t = "Un";break;
                Case 2:  $t = "Dos";break;
                Case 3:  $t = "Tres";break;
                Case 4:  $t = "Cuatro";break;
                Case 5:  $t = "Cinco";break;
                Case 6:  $t = "Seis";break;
                Case 7:  $t = "Siete";break;
                Case 8:  $t = "Ocho";break;
                Case 9:  $t = "Nueve";break;
                Case 10: $t = "Diez";break;
                Case 20: $t = "Veinte";break;
                Case 30: $t = "Treinta";break;
                Case 40: $t = "Cuarenta";break;
                Case 50: $t = "Cincuenta";break;
                Case 60: $t = "Sesenta";break;
                Case 70: $t = "Setenta";break;
                Case 80: $t = "Ochenta";break;
                Case 90: $t = "Noventa";break;
                Case 100: $t = "Cien";break;
                Case 200: $t = "Doscientos";break;
                Case 300: $t = "Trescientos";break;
                Case 400: $t = "Cuatrocientos";break;
                Case 500: $t = "Quinientos";break;
                Case 600: $t = "Seiscientos";break;
                Case 700: $t = "Setecientos";break;
                Case 800: $t = "Ochocientos";break;
                Case 900: $t = "Novecientos";break;
                Case 1000: $t = "Mil";break;
                Case 1000000: $t = "Millón";break;
            }

            If($t == $this->Void)
            {
                $i = $i + 1;
                $x = $x / 1000;
                If($x== 0) $i = 0;
            }
            else
                break;

        }while($i != 0);

        $Rtn = $t;
        Switch($i)
        {
            Case 0: $t = $this->Void;break;
            Case 1: $t = " Mil";break;
            Case 2: $t = " Millones";break;
            Case 3: $t = " Billones";break;
        }
        return($Rtn . $t);
    }
}
?>
<script>
    $("#demo").qrcode({
        //render:"table"
        width: 80,
        height: 80,
        text: "Motoescuela Dakar"
    });
</script>