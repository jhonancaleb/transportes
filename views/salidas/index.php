<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
      <link rel="shortcut icon" href="../../assets/img/logo.png" type="image/x-icon">
      <link rel="stylesheet" href="./../../assets/css/salidas.css">
      <title>SystemTransport</title>
   </head>
   <body>
      <div class="container_all">
         <?php include "../menu.php";?>
         <div class="view">
            <h1 class="title">Gestión de Salidas</h1>
            <main class="main">         
               <form class="form" id="form-add" >
                  <h3>Agregar Salidas</h3>
                  <div class="form__group">
                     <label for="codigo">Origen</label>
                     <input
                        type="text"
                        class="form__control"
                        name="tx_origen"
                        required
                     />
                  </div>
                  <div class="form__group">
                     <label for="codigo">Destino</label>
                     <input
                        type="text"
                        class="form__control"
                        name="tx_destino"
                        required
                     />
                  </div>
                  <div class="form__group">
                     <label for="codigo">Fecha</label>
                     <input
                        type="date"
                        class="form__control"
                        name="tx_fecha"
                        required
                     />
                  </div>
                  <div class="form__group">
                     <label for="codigo">Hora</label>
                     <input
                        type="time"
                        class="form__control"
                        name="tx_hora"
                        required
                     />
                  </div>
                  <div class="form__group">
                     <label for="codigo">Monto S/</label>
                     <input
                        type="text"
                        class="form__control"
                        name="tx_monto"
                        id="s3"
                        required
                     />
                  </div>
                  <input type="submit" value="Agregar" class="form__button" />
               </form>
               <div class="tableBox">
                  <table class="table">
                     <thead class="table__thead">
                        <tr>
                           <th scope="col">ORIGEN</th>
                           <th scope="col">DESTINO</th>
                           <th scope="col">MONTO</th>
                           <th scope="col">FECHA</th>
                           <th scope="col">HORA</th>
                           <th scope="col">OPCIONES</th>
                        </tr>
                     </thead>
                     <tbody class="table__tbody">
                        <tr>
                           <td>ffff</td>
                           <td>ffff</td>
                           <td>ffff</td>
                           <td>ffff</td>
                           <td>ffff</td>
                           <td>
                              <button class="table_btn" style="--clr:#67e669;" title="Administrar"><i class="uil uil-user-check"></i></button>
                              <button class="table_btn" style="--clr:#4f8dd5;" title="Editar"><i class="uil uil-edit"></i></button>
                              <button class="table_btn" style="--clr:#f7616d;" title="Eliminar"><i class="uil uil-trash-alt"></i></button>
                           </td>
                        </tr>                   
                        
                     </tbody>
                  </table>
               </div>
            </main>
         </div>
      </div>
      <script src="../../assets/js/app.js"></script>
   </body>
</html>
