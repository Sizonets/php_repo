<?

// не получается чтобы в зависимости от массива имен функция выводила имена с нужным окончанием строки
/*Условие: при поступлении в функцию пустого массива должен вывести "mast be "no one likes this"
если из одного имени - "mast be "Peter likes this"
если из двух - "mast be "Peter and Alex likes this"
из трех - "mast be "Peter, Alex and Mark likes this"
из четырех и более - "mast be "Peter, Alex and 2 others likes this" (где 2 оставшееся количество имен в массиве)*/

$arr = ["Jacob", "Alex"];
/*likes ["Peter"]
likes ["Jacob", "Alex"]
likes ["Max", "John", "Mark"]
likes ["Alex", "Jacob", "Mark", "Max"] */

function likes($names) {
    if (is_array($names)){
        $str_names = 'no one';
        $str = "mast be \" {$str_names} likes this\"";
        if (count($names) == 0){
            return $str;
        } else if (count($names) == 1) {
            foreach ($names as $value) {
                $str_names = $value;
            }
            return $str;
        } else if (count($names) == 2){
            foreach ($names as $key => $value){
                ($key == 0)? $str_names = $value . " ": $str_names .= "and" . $value;
            }
            return $str;
        } else if (count($names) == 3){
            foreach ($names as $key => $value){
                switch ($key){
                    case 0:
                        $str_names = $value . ", ";
                        break;
                    case 1:
                        $str_names .= $value . " and ";
                        break;
                    case 2:
                        $str_names .= $value;
                }
            }
            return $str;
        } else if(count($names) > 3) {
            $long = count($names) - 2;
            foreach ($names as $key => $value){
                switch ($key){
                    case 0:
                        $str_names = $value . ", ";
                        break;
                    case 1:
                        $str_names .= $value . " and {$long} others";
                        break;
                }
            }
            return $str;
        }
    }
    // Your code here...
}

echo likes($arr);
