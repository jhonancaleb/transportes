<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Salidas</title>
    <style>
        body{position: relative;}
        button{
            position: absolute;
            right: 30px;
        }
        input[type="submit"]{
            width: 88%;
        }
        form{
            height: 0;
            overflow: hidden;
            width: 655px;
            border-radius:5px;
            display:flex;
            flex-wrap:wrap;
            justify-content: center;
            align-items: center;
            background: #F0EFEF;
            transition:all 0.5s;
            margin: 50px auto 0 auto ;

        }
        form.active{
            height: auto;
            padding: 30px;
            border:2px solid #DBDFEE;
            margin: 50px auto ;
        }
        form .mb-3{
            width: 15em;
            margin: 0 20px;
        }
        td{
            padding: 15px !important;
        }
    </style>
</head>
<body>
    <button class="btn btn-info" id="btn-add">Agregar Salida</button>
    <form action="salidas.php" method="post" id="form-add">
        <div class="mb-3">
		    <label for="codigo">Id. Salida</label>
		    <input type="text" class="form-control" name="tx_salida" maxlength="4" minlength="4" onkeypress="valide(event)" required/>
		</div>	
		<div class="mb-3">
		    <label for="codigo">Origen</label>
		    <input type="text" class="form-control" name="tx_origen" onkeyup="javascript:this.value=this.value.toUpperCase();" required/>
		</div>	
		<div class="mb-3">
		    <label for="codigo">Destino</label>
		    <input type="text" class="form-control" name="tx_destino" onkeyup="javascript:this.value=this.value.toUpperCase();" required/>
		</div>	
		<div class="mb-3">
		    <label for="codigo">Fecha</label>
		    <input type="date" class="form-control" name="tx_fecha" required/>
		</div>	
		<div class="mb-3">
		    <label for="codigo">Hora</label>
		    <input type="time" class="form-control" name="tx_hora" required/>
		</div>	
		<div class="mb-3">
		    <label for="codigo">Monto</label>
		    <input type="text" class="form-control" name="tx_monto" id="s3" onkeypress="valide(event)" required />
		</div>	
        <?php
            include "../conexion.php";
            if(!empty($_POST['tx_salida'])=="")
            {}
            else
            {
                $salida=$_POST["tx_salida"];
                $origen=$_POST["tx_origen"];
                $destino=$_POST["tx_destino"];
                $fecha=$_POST["tx_fecha"];
                $hora=$_POST["tx_hora"];
                $monto=$_POST["tx_monto"];
                //insertar salida
                $sql="INSERT INTO salidas VALUES($salida,'$fecha','$hora','$origen','$destino',$monto)";
                $sql_re=$conexion->query($sql);
                //creando asientos de la salida
                $i=1;
                while($i<=36){
                    $sql="INSERT INTO asientos(id_salida,n_asiento,estado) VALUES($salida,'$i','DISPONIBLE')";
                    $sql_re=$conexion->query($sql);
                    $i++;
                }
                
                /* try{
                    echo'
                    <div class="alert alert-success" role="alert">
                    <i>Listo.</i> Los datos se insertaron correctamente.
                    </div> 
                    ';
                }
                catch (Exception $e){
                    echo'
                    <div class="alert alert-danger" role="alert">
                    <i>Error.</i> Los datos se no se insertaron.
                    </div> 
                    ';
                }  */
            }  
        ?>
        <input type="submit" value="Agregar" class="btn btn-primary">
    </form>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th scope="col">ID SALIDA</th>
                <th scope="col">MONTO</th>
                <th scope="col">FECHA</th>
                <th scope="col">HORA</th>
                <th scope="col">ORIGEN</th>
                <th scope="col">DESTINO</th>
            </tr>
        </thead>
        <?php
            $res="Select * from salidas";
        	$vres = $conexion->query($res);
        	while ($row=$vres->fetch_array()){	  
                $ids = $row['id_salida']; 
                $mon = $row['monto']; 
                $fecha = $row['fecha']; 
                $hora = $row['hora']; 
                $origen = $row['origen']; 
                $destino = $row['destino']; 
        		echo '
                    <tr>
                        <td><a href="control.php?salida='.$ids.'">'.$ids.'</a></td>
                        <td>'.$mon.'</td>
                        <td>'.$fecha.'</td>
                        <td>'.$hora.'</td>
                        <td>'.$origen.'</td>
                        <td>'.$destino.'</td>
                    </tr>
                '; 		
            }	
        ?>
    </table>
    <script>
        function valide(event){
            if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
        }
        //archivo salidas.php script para aparecer el form de agregar 
        const btn_add=document.querySelector("#btn-add");
        let form=document.querySelector("#form-add");
        function show(){
            form.classList.toggle('active');
        }
        btn_add.onclick=show;
    </script>
</body>
</html>