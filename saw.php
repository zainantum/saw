<?php
class Saw{
  $category = ["pasar", "pendapatan", "infrastruktur", "transportasi"];
  $weight = [
      "pasar" => 40,
      "pendapatan" => 70,
      "infrastruktur" => 20,
      "transportasi" => 25
  ];
  
  $dataExample = [
      "Alt 1" => [
          "pasar" => 2100000,
          "pendapatan" => 7200,
          "infrastruktur" => 800,
          "transportasi" => 100
      ],
      "Alt 2" => [
          "pasar" => 2000000,
          "pendapatan" => 7200,
          "infrastruktur" => 600,
          "transportasi" => 150
      ],
      "Alt 3" => [
          "pasar" => 2450000,
          "pendapatan" => 7200,
          "infrastruktur" => 1000,
          "transportasi" => 200
      ]
  ];
  
  function calculateSaw(){
    $maxji = [];
    $final = [];
    // use maximum ji if attribute benefit
    // use minimum ji if atrribute cost
    foreach($category as $keyCtgr){
        $maxji[$keyCtgr] = max(array_column($dataExample, $keyCtgr));
    }
    
    foreach($dataExample as $key => $value){
        $calc = 0;
        foreach($value as $kAlt => $dataAlt){
            $calc += $dataAlt/$maxji[$kAlt]*$weight[$kAlt];
        }
        $final[$key] = $calc;
    }
    
    // sort alt 
    usort($final, function ($a, $b) { return $a < $b; });
  }
}
?>
