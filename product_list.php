<?php
include './include/inc_config.php';
include './include/session_config.php';
include './include/auth_redirect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Reactive record</title>
   <link href="./assets/materialize/css/materialize.min.css" rel="stylesheet">
   <link href="./style.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link href="./assets/font-awesome/css/all.css" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700&display=swap&subset=cyrillic" rel="stylesheet">
</head>

<body>

   <div id="dashboard">

      <?php include './include/inc_sidebar.php'; ?>

      <div id="main-wrapper">
         <div class="container" style="padding-top: 40px">
            <div class="card-panel white">



               <div id="prihod" class="content-block">
                  <h2 style="margin: 0">Список номенклатур</h2>
                  <hr>
                  <p>Представление таблицы «<b>product_list</b>». Содержит список всех используемых номенклатур с общими свойствами, характерными для каждой конкретной номенклатуры. </p>
                  <table>
                     <thead>
                        <tr>
                           <th>ID</th>
                           <th>Наименование</th>
                           <th>Ед.изм</th>
                           <th>Объем</th>
                           <th>GTIN</th>
                           <th>Вид номенклатуры</th>
                           <th>Срок годности (суток)</th>
                           <th>Доп.поля (молоко)</th>
                        </tr>
                     </thead>

                     <tbody>

                        <?php
                        foreach ($mysqli->query('SELECT product_list.product_id, product_list.title, units.unit, product_list.capacity, product_list.gtin, product_types.type, product_list.valid_days, product_list.extended_milk_fields    
                        FROM product_list, units, product_types
                        WHERE product_list.unit_code = units.unit_id AND product_list.product_type = product_types.type_id') as $row) {
                           echo "<tr>
                           <td>$row[product_id]</td>
                           <td>$row[title]</td>
                           <td>$row[unit]</td>
                           <td>$row[capacity]</td>
                           <td>$row[gtin]</td>
                           <td>$row[type]</td>
                           <td>$row[valid_days]</td>
                           <td>$row[extended_milk_fields]</td>
                           </tr>";
                        }
                        ?>

                     </tbody>
                  </table>
               </div>



            </div>


         </div>
      </div>
   </div>

   <script src="./assets/materialize/js/materialize.min.js"></script>
   <script src="./js/script.js"></script>
   <script src="./js/logout.js"></script>
</body>

</html>