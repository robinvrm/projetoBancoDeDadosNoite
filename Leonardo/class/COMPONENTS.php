<?php include_once('../connection/CONNECTION.php'); ?>
<?php
class COMPONENTS
{
  private static function testType($type, $extended = true)
  {
    $types = ['primary', 'success', 'danger', 'warning', 'info'];
    if ($extended) {
      $types = ['primary', 'success', 'danger', 'warning', 'info', 'light', 'dark', 'secondary', 'default'];
    }

    if (!in_array($type, $types)) {
      die("Unknown type {$type}.");
    }
  }

  public static function alert($msg, $type = 'info')
  {
    self::testType($type);

    echo "<div class='alert alert-{$type} text-center' role='alert'>{$msg}</div>";
  }

  public static function headerPage($msg)
  {
    echo "<div class='card m-3'><div class='card-header text-capitalize'><h2>{$msg}</h2></div></div><hr>";
  }

  public static function btn($colorButton, $typeButton, $titleButton)
  {
    $titleButton = strtoupper($titleButton);
    echo "<div class='form-group mt-3'><button type='button' class='btn btn-{$colorButton} btn-{$typeButton}' id='button-{$typeButton}'>{$titleButton}</button></div>";
  }

  public static function btnGen()
  {
    echo "<div class='form-group mt-3'><button type='button' class='btn btn-secondary btn-secondary' id='button-gen'>Gerar</button></div>";
  }

  public static function dateRange($date1 = false, $date2 = false)
  {
    if ($date1 == false) {
      $date1 = date('Y-m-d');
    }
    if ($date2 == false) {
      $date2 = date('Y-m-d');
    }

    echo "<div class='row justify-content-center mt-3'>"; {
      echo "<div class='col-md-3'></div>";
      echo "<div class='col-md-3'>"; {
        echo "
          <button 
              id='data-inicial' 
              title='Data Inicial' 
              type='button' 
              class='btn btn-default btn-block' 
              style='cursor: pointer;' 
              value='{$date1}'
          >
              <span class='fas fa-calendar'></span>
            {$date1}
          </button>";
      }
      echo "</div>";

      echo "<div class='col-md-3'>"; {
        echo "
          <button 
              id='data-final' 
              title='Data Final' 
              type='button' 
              class='btn btn-default btn-block' 
              style='cursor: pointer;' 
              value='{$date2}'
          >
              <span class='fas fa-calendar'></span>
            {$date2}
          </button>";
      }
      echo "</div>";
      echo "<div class='col-md-3'></div>";
    }
    echo "</div>";

    echo "<p></p>"; //RETRO COMPATIBILITY v2 & v3
  }

  public static function dateRangev2($placeholderDataInicial, $placeholderDataFinal)
  {
    echo "<div class='row justify-content-center mt-3'>"; {
      echo "<div class='col-md-6'>"; {
        echo "<div class='input-group'>
                <div class='input-group-text'><i class='bx bxs-calendar'></i></div>
                <input type='text' name='data-inicial' id='data-inicial' placeholder='{$placeholderDataInicial}' class='form-control form-control-lg'>
              </div>";
      }
      echo "</div>";

      echo "<div class='col-md-6'>"; {
        echo "<div class='input-group'>
                <div class='input-group-text'><i class='bx bxs-calendar'></i></div>
                <input type='text' name='data-final' id='data-final' placeholder='{$placeholderDataFinal}' class='form-control form-control-lg'>
              </div>";
      }
      echo "</div>";
    }
    echo "</div>";
  }

  public static function dateUnique($placeholderData)
  {
    echo "<div class='row justify-content-center mt-3'>"; {
      echo "<div class='col-md-6'>"; {
        echo "<div class='input-group'>
                <div class='input-group-text'><i class='bx bxs-calendar'></i></div>
                <input type='text' name='data-busca' id='data-busca' placeholder='{$placeholderData}' class='form-control form-control-lg'>
              </div>";
      }
      echo "</div>";
    }
    echo "</div>";
  }

  public static function listaCategorias()
  {
    echo "<select class='form-select form-select-lg mb-3' id='categoria'>";
    echo "<option selected>Selecione uma categoria</option>";
    $listaCategorias = Categorias::getAllCategorias();
    foreach ($listaCategorias as $categoria) {
      echo "<option value='{$categoria['id']}'>{$categoria['nome']}</option>";
    }
    echo "</select>";
  }
}
