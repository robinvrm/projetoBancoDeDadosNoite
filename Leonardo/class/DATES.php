<?php include_once('../connection/CONNECTION.php'); ?>
<?php
class DATES
{
  public static function date_to_mysql($date)
  {
    $explode = explode("/", $date);

    if (isset($explode[2]) && isset($explode[1]) && isset($explode[0])) {
      return date('Y-m-d', strtotime($explode[2] . "-" . $explode[1] . "-" . $explode[0]));
    } else {
      return false;
    }
  }

  public static function mysql_to_date($date)
  {
    $dateT = date("d/m/Y", strtotime($date));
    if ($dateT == "30/11/-0001") {
      return "00/00/0000";
    } else {
      return $dateT;
    }
  }

  public static function today()
  {
    return date("d/m/Y");
  }

  public static function today_mysql()
  {
    return date("Y-m-d");
  }

  public static function now()
  {
    return date("d/m/Y H:i:s");
  }

  public static function now_mysql()
  {
    return date("Y-m-d H:i:s");
  }

  public static function get_new_date($diff_days = 0, $mysql_format = false, $initial_date = false)
  {
    if ($initial_date) {
      $time = strtotime($initial_date . " $diff_days days");
    } else {
      $time = strtotime(date("Y-m-d") . " $diff_days days");
    }

    return $mysql_format ? date("Y-m-d", $time) : date("d/m/Y", $time);
  }

  public static function get_new_date_year($diff_year = 0, $mysql_format = false, $initial_date = false)
  {
    if ($initial_date) {
      $time = strtotime($initial_date . " $diff_year years");
    } else {
      $time = strtotime(date("Y-m-d") . " $diff_year years");
    }

    return $mysql_format ? date("Y-m-d", $time) : date("d/m/Y", $time);
  }

  public static function get_new_date_month($diff_month = 0, $initial_date = false /* MYSQL FORMAT */, $mysql_format = false, $showDay = true)
  {
    if (!$initial_date) {
      $initial_date = date("Y-m-d");
    }
    $time = strtotime($initial_date . " $diff_month months");

    if ($showDay) {
      return $mysql_format ? date("Y-m-d", $time) : date("d/m/Y", $time);
    } else {
      return $mysql_format ? date("Y-m", $time) : date("m/Y", $time);
    }
  }

  public static function get_new_date_by_month($diff_month = 0, $initial_date = false /* MYSQL FORMAT */, $mysql_format = false)
  {
    if (!$initial_date) {
      $initial_date = self::today_mysql();
    }

    $dia = self::getDayDate($initial_date);
    $mes = self::getMonthDate($initial_date);
    $ano = self::getYearDate($initial_date);

    $mesNovo = date("m", mktime(0, 0, 0, $mes + $diff_month, 01, $ano));
    $anoNovo = date("Y", mktime(0, 0, 0, $mes + $diff_month, 01, $ano));

    if (($mesNovo == 2) && ($dia == 28 || $dia == 29 || $dia == 30 || $dia == 31)) {
      $diaNovo = cal_days_in_month(CAL_GREGORIAN, $mesNovo, $anoNovo);
    } else {
      if ($dia == 31) {
        $diaNovo = cal_days_in_month(CAL_GREGORIAN, $mesNovo, $anoNovo);
      } else {
        $diaNovo = $dia;
      }
    }

    $dataNova = date("Y-m-d", mktime(0, 0, 0, $mesNovo, $diaNovo, $anoNovo));

    if (!$mysql_format) {
      $dataNova = self::mysql_to_date($dataNova);
    }

    return $dataNova;
  }

  public static function getDayDate($date = false)
  {
    if (!$date) {
      $date = strtotime(self::today_mysql());
    } else {
      $date = strtotime($date);
    }

    return date("d", $date);
  }

  public static function getMonthDate($date = false)
  {
    if (!$date) {
      $date = strtotime(self::today_mysql());
    } else {
      $date = strtotime($date);
    }

    return date("m", $date);
  }

  public static function getYearDate($date = false)
  {
    if (!$date) {
      $date = strtotime(self::today_mysql());
    } else {
      $date = strtotime($date);
    }

    return date("Y", $date);
  }

  public static function getFirstDayOfMonth()
  {
    return date("Y-m-01");
  }

  public static function getFirstDayOfMonthPast()
  {
    $hojeTime               = time();
    $mesAnterior            = date("m", mktime(0, 0, 0, date("m", $hojeTime) - 1, date("d", $hojeTime), date("Y", $hojeTime)));
    $anoMesAnterior         = date("Y", mktime(0, 0, 0, date("m", $hojeTime) - 1, date("d", $hojeTime), date("Y", $hojeTime)));
    $primeiroDiaMesAnterior = $anoMesAnterior . "-" . $mesAnterior . "-01";

    return $primeiroDiaMesAnterior;
  }

  public static function getLastDayOfMonthPast()
  {
    $hojeTime             = time();
    $mesAnterior          = date("m", mktime(0, 0, 0, date("m", $hojeTime) - 1, date("d", $hojeTime), date("Y", $hojeTime)));
    $anoMesAnterior       = date("Y", mktime(0, 0, 0, date("m", $hojeTime) - 1, date("d", $hojeTime), date("Y", $hojeTime)));
    $ultimoDiaMesAnterior = cal_days_in_month(CAL_GREGORIAN, $mesAnterior, $anoMesAnterior);
    $ultimoDiaMesAnterior = $anoMesAnterior . "-" . $mesAnterior . "-" . $ultimoDiaMesAnterior;

    return $ultimoDiaMesAnterior;
  }

  public static function getSQLBetweens($year, $month)
  {
    $year  = (int)$year;
    $month = (int)$month;

    if (is_int($year) && is_int($month)) {
      $month = str_pad($month, 2, '0', STR_PAD_LEFT);

      return " BETWEEN '{$year}-{$month}-01' AND '{$year}-{$month}-31' ";
    } else {
      die('Need Year and Month to continue...');
    }
  }
}
?>