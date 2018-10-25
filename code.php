<html>
  <head>
    <meta charset="utf-8">
    <title>Main Page</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <style type="text/css">
    .table_cat {
      position: fixed;
      top: 4%;
      left: 3%;
      width: 50%;
      border: 0px solid white;
    }

    tr,td {
      border: 1px lightblue solid;
      padding-top: 1%;
      padding-bottom: 1%;
    }

    td {
      text-align: left;
      line-height: 20px;
      padding: 1%;
    }

    .td1 {
      width:70px;
      text-align:center;
    }

    .td2 {
      width:300px;
    }

    .td3 {
      width:300px;
    }

    .td4 {
      width:300px;
      text-align:center
    }

    </style>
  </head>
  <body>
    <h1></h1>
    <center>
    <table>
      <?php
      require "connect.php";
        $q = "SELECT * FROM tbl_recurso";
        $query = mysqli_query($con,$q);

        if (mysqli_num_rows($query)) {
          while ($rec = mysqli_fetch_array($query)) {
            echo "
            <tr>
            <td class='td1'><img src='' width='40px;'></td>
            <td class='td2'>" . utf8_encode($rec['Recurso_Nombre']) . "<br>" . utf8_encode($rec['Recurso_Tipo']) . "</td>
            <td class='td3'>" . $rec['Recurso_Estado'] . "</td>
            <td class='td4'><form action='#' method='GET'><input type='submit' value='Reservar' name='btn_reservar'></input></form></td></tr>";
          }
        }
      ?>
    </table>
  </center>
  </body>
</html>
