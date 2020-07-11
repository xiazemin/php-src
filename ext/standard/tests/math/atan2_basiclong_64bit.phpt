--TEST--
Test atan2 function : 64bit long tests
--SKIPIF--
<?php
if (PHP_INT_SIZE != 8) die("skip this test is for 64bit platform only");
?>
--FILE--
<?php

define("MAX_64Bit", 9223372036854775807);
define("MAX_32Bit", 2147483647);
define("MIN_64Bit", -9223372036854775807 - 1);
define("MIN_32Bit", -2147483647 - 1);

$longVals = array(
    MAX_64Bit, MIN_64Bit, MAX_32Bit, MIN_32Bit, MAX_64Bit - MAX_32Bit, MIN_64Bit - MIN_32Bit,
    MAX_32Bit + 1, MIN_32Bit - 1, MAX_32Bit * 2, (MAX_32Bit * 2) + 1, (MAX_32Bit * 2) - 1,
    MAX_64Bit -1, MAX_64Bit + 1, MIN_64Bit + 1, MIN_64Bit - 1
);

$otherVals = array(0, 1, -1, 7, 9, 65, -44, MAX_32Bit, MIN_32Bit, MAX_64Bit, MIN_64Bit);


foreach ($longVals as $longVal) {
   foreach($otherVals as $otherVal) {
       echo "--- testing: $longVal, $otherVal ---\n";
      var_dump(atan2($longVal, $otherVal));
   }
}

?>
--EXPECT--
--- testing: 9223372036854775807, 0 ---
float(1.5707963267948966)
--- testing: 9223372036854775807, 1 ---
float(1.5707963267948966)
--- testing: 9223372036854775807, -1 ---
float(1.5707963267948966)
--- testing: 9223372036854775807, 7 ---
float(1.5707963267948966)
--- testing: 9223372036854775807, 9 ---
float(1.5707963267948966)
--- testing: 9223372036854775807, 65 ---
float(1.5707963267948966)
--- testing: 9223372036854775807, -44 ---
float(1.5707963267948966)
--- testing: 9223372036854775807, 2147483647 ---
float(1.570796326562066)
--- testing: 9223372036854775807, -2147483648 ---
float(1.5707963270277272)
--- testing: 9223372036854775807, 9223372036854775807 ---
float(0.7853981633974483)
--- testing: 9223372036854775807, -9223372036854775808 ---
float(2.356194490192345)
--- testing: -9223372036854775808, 0 ---
float(-1.5707963267948966)
--- testing: -9223372036854775808, 1 ---
float(-1.5707963267948966)
--- testing: -9223372036854775808, -1 ---
float(-1.5707963267948966)
--- testing: -9223372036854775808, 7 ---
float(-1.5707963267948966)
--- testing: -9223372036854775808, 9 ---
float(-1.5707963267948966)
--- testing: -9223372036854775808, 65 ---
float(-1.5707963267948966)
--- testing: -9223372036854775808, -44 ---
float(-1.5707963267948966)
--- testing: -9223372036854775808, 2147483647 ---
float(-1.570796326562066)
--- testing: -9223372036854775808, -2147483648 ---
float(-1.5707963270277272)
--- testing: -9223372036854775808, 9223372036854775807 ---
float(-0.7853981633974483)
--- testing: -9223372036854775808, -9223372036854775808 ---
float(-2.356194490192345)
--- testing: 2147483647, 0 ---
float(1.5707963267948966)
--- testing: 2147483647, 1 ---
float(1.5707963263292353)
--- testing: 2147483647, -1 ---
float(1.5707963272605578)
--- testing: 2147483647, 7 ---
float(1.5707963235352675)
--- testing: 2147483647, 9 ---
float(1.570796322603945)
--- testing: 2147483647, 65 ---
float(1.5707962965269129)
--- testing: 2147483647, -44 ---
float(1.5707963472839932)
--- testing: 2147483647, 2147483647 ---
float(0.7853981633974483)
--- testing: 2147483647, -2147483648 ---
float(2.3561944904251755)
--- testing: 2147483647, 9223372036854775807 ---
float(2.328306435454494E-10)
--- testing: 2147483647, -9223372036854775808 ---
float(3.1415926533569625)
--- testing: -2147483648, 0 ---
float(-1.5707963267948966)
--- testing: -2147483648, 1 ---
float(-1.5707963263292353)
--- testing: -2147483648, -1 ---
float(-1.5707963272605578)
--- testing: -2147483648, 7 ---
float(-1.5707963235352675)
--- testing: -2147483648, 9 ---
float(-1.570796322603945)
--- testing: -2147483648, 65 ---
float(-1.5707962965269129)
--- testing: -2147483648, -44 ---
float(-1.5707963472839932)
--- testing: -2147483648, 2147483647 ---
float(-0.7853981636302789)
--- testing: -2147483648, -2147483648 ---
float(-2.356194490192345)
--- testing: -2147483648, 9223372036854775807 ---
float(-2.3283064365386963E-10)
--- testing: -2147483648, -9223372036854775808 ---
float(-3.1415926533569625)
--- testing: 9223372034707292160, 0 ---
float(1.5707963267948966)
--- testing: 9223372034707292160, 1 ---
float(1.5707963267948966)
--- testing: 9223372034707292160, -1 ---
float(1.5707963267948966)
--- testing: 9223372034707292160, 7 ---
float(1.5707963267948966)
--- testing: 9223372034707292160, 9 ---
float(1.5707963267948966)
--- testing: 9223372034707292160, 65 ---
float(1.5707963267948966)
--- testing: 9223372034707292160, -44 ---
float(1.5707963267948966)
--- testing: 9223372034707292160, 2147483647 ---
float(1.570796326562066)
--- testing: 9223372034707292160, -2147483648 ---
float(1.5707963270277272)
--- testing: 9223372034707292160, 9223372036854775807 ---
float(0.785398163281033)
--- testing: 9223372034707292160, -9223372036854775808 ---
float(2.35619449030876)
--- testing: -9223372034707292160, 0 ---
float(-1.5707963267948966)
--- testing: -9223372034707292160, 1 ---
float(-1.5707963267948966)
--- testing: -9223372034707292160, -1 ---
float(-1.5707963267948966)
--- testing: -9223372034707292160, 7 ---
float(-1.5707963267948966)
--- testing: -9223372034707292160, 9 ---
float(-1.5707963267948966)
--- testing: -9223372034707292160, 65 ---
float(-1.5707963267948966)
--- testing: -9223372034707292160, -44 ---
float(-1.5707963267948966)
--- testing: -9223372034707292160, 2147483647 ---
float(-1.570796326562066)
--- testing: -9223372034707292160, -2147483648 ---
float(-1.5707963270277272)
--- testing: -9223372034707292160, 9223372036854775807 ---
float(-0.785398163281033)
--- testing: -9223372034707292160, -9223372036854775808 ---
float(-2.35619449030876)
--- testing: 2147483648, 0 ---
float(1.5707963267948966)
--- testing: 2147483648, 1 ---
float(1.5707963263292353)
--- testing: 2147483648, -1 ---
float(1.5707963272605578)
--- testing: 2147483648, 7 ---
float(1.5707963235352675)
--- testing: 2147483648, 9 ---
float(1.570796322603945)
--- testing: 2147483648, 65 ---
float(1.5707962965269129)
--- testing: 2147483648, -44 ---
float(1.5707963472839932)
--- testing: 2147483648, 2147483647 ---
float(0.7853981636302789)
--- testing: 2147483648, -2147483648 ---
float(2.356194490192345)
--- testing: 2147483648, 9223372036854775807 ---
float(2.3283064365386963E-10)
--- testing: 2147483648, -9223372036854775808 ---
float(3.1415926533569625)
--- testing: -2147483649, 0 ---
float(-1.5707963267948966)
--- testing: -2147483649, 1 ---
float(-1.5707963263292353)
--- testing: -2147483649, -1 ---
float(-1.5707963272605578)
--- testing: -2147483649, 7 ---
float(-1.5707963235352675)
--- testing: -2147483649, 9 ---
float(-1.570796322603945)
--- testing: -2147483649, 65 ---
float(-1.5707962965269129)
--- testing: -2147483649, -44 ---
float(-1.5707963472839932)
--- testing: -2147483649, 2147483647 ---
float(-0.7853981638631096)
--- testing: -2147483649, -2147483648 ---
float(-2.356194489959514)
--- testing: -2147483649, 9223372036854775807 ---
float(-2.3283064376228985E-10)
--- testing: -2147483649, -9223372036854775808 ---
float(-3.1415926533569625)
--- testing: 4294967294, 0 ---
float(1.5707963267948966)
--- testing: 4294967294, 1 ---
float(1.570796326562066)
--- testing: 4294967294, -1 ---
float(1.5707963270277272)
--- testing: 4294967294, 7 ---
float(1.570796325165082)
--- testing: 4294967294, 9 ---
float(1.5707963246994208)
--- testing: 4294967294, 65 ---
float(1.5707963116609047)
--- testing: 4294967294, -44 ---
float(1.5707963370394449)
--- testing: 4294967294, 2147483647 ---
float(1.1071487177940904)
--- testing: 4294967294, -2147483648 ---
float(2.034443935981967)
--- testing: 4294967294, 9223372036854775807 ---
float(4.656612870908988E-10)
--- testing: 4294967294, -9223372036854775808 ---
float(3.141592653124132)
--- testing: 4294967295, 0 ---
float(1.5707963267948966)
--- testing: 4294967295, 1 ---
float(1.570796326562066)
--- testing: 4294967295, -1 ---
float(1.5707963270277272)
--- testing: 4294967295, 7 ---
float(1.570796325165082)
--- testing: 4294967295, 9 ---
float(1.5707963246994208)
--- testing: 4294967295, 65 ---
float(1.5707963116609047)
--- testing: 4294967295, -44 ---
float(1.5707963370394449)
--- testing: 4294967295, 2147483647 ---
float(1.1071487178872228)
--- testing: 4294967295, -2147483648 ---
float(2.034443935888835)
--- testing: 4294967295, 9223372036854775807 ---
float(4.6566128719931904E-10)
--- testing: 4294967295, -9223372036854775808 ---
float(3.141592653124132)
--- testing: 4294967293, 0 ---
float(1.5707963267948966)
--- testing: 4294967293, 1 ---
float(1.570796326562066)
--- testing: 4294967293, -1 ---
float(1.5707963270277272)
--- testing: 4294967293, 7 ---
float(1.570796325165082)
--- testing: 4294967293, 9 ---
float(1.5707963246994208)
--- testing: 4294967293, 65 ---
float(1.5707963116609047)
--- testing: 4294967293, -44 ---
float(1.5707963370394449)
--- testing: 4294967293, 2147483647 ---
float(1.1071487177009582)
--- testing: 4294967293, -2147483648 ---
float(2.0344439360750997)
--- testing: 4294967293, 9223372036854775807 ---
float(4.656612869824786E-10)
--- testing: 4294967293, -9223372036854775808 ---
float(3.141592653124132)
--- testing: 9223372036854775806, 0 ---
float(1.5707963267948966)
--- testing: 9223372036854775806, 1 ---
float(1.5707963267948966)
--- testing: 9223372036854775806, -1 ---
float(1.5707963267948966)
--- testing: 9223372036854775806, 7 ---
float(1.5707963267948966)
--- testing: 9223372036854775806, 9 ---
float(1.5707963267948966)
--- testing: 9223372036854775806, 65 ---
float(1.5707963267948966)
--- testing: 9223372036854775806, -44 ---
float(1.5707963267948966)
--- testing: 9223372036854775806, 2147483647 ---
float(1.570796326562066)
--- testing: 9223372036854775806, -2147483648 ---
float(1.5707963270277272)
--- testing: 9223372036854775806, 9223372036854775807 ---
float(0.7853981633974483)
--- testing: 9223372036854775806, -9223372036854775808 ---
float(2.356194490192345)
--- testing: 9.2233720368548E+18, 0 ---
float(1.5707963267948966)
--- testing: 9.2233720368548E+18, 1 ---
float(1.5707963267948966)
--- testing: 9.2233720368548E+18, -1 ---
float(1.5707963267948966)
--- testing: 9.2233720368548E+18, 7 ---
float(1.5707963267948966)
--- testing: 9.2233720368548E+18, 9 ---
float(1.5707963267948966)
--- testing: 9.2233720368548E+18, 65 ---
float(1.5707963267948966)
--- testing: 9.2233720368548E+18, -44 ---
float(1.5707963267948966)
--- testing: 9.2233720368548E+18, 2147483647 ---
float(1.570796326562066)
--- testing: 9.2233720368548E+18, -2147483648 ---
float(1.5707963270277272)
--- testing: 9.2233720368548E+18, 9223372036854775807 ---
float(0.7853981633974483)
--- testing: 9.2233720368548E+18, -9223372036854775808 ---
float(2.356194490192345)
--- testing: -9223372036854775807, 0 ---
float(-1.5707963267948966)
--- testing: -9223372036854775807, 1 ---
float(-1.5707963267948966)
--- testing: -9223372036854775807, -1 ---
float(-1.5707963267948966)
--- testing: -9223372036854775807, 7 ---
float(-1.5707963267948966)
--- testing: -9223372036854775807, 9 ---
float(-1.5707963267948966)
--- testing: -9223372036854775807, 65 ---
float(-1.5707963267948966)
--- testing: -9223372036854775807, -44 ---
float(-1.5707963267948966)
--- testing: -9223372036854775807, 2147483647 ---
float(-1.570796326562066)
--- testing: -9223372036854775807, -2147483648 ---
float(-1.5707963270277272)
--- testing: -9223372036854775807, 9223372036854775807 ---
float(-0.7853981633974483)
--- testing: -9223372036854775807, -9223372036854775808 ---
float(-2.356194490192345)
--- testing: -9.2233720368548E+18, 0 ---
float(-1.5707963267948966)
--- testing: -9.2233720368548E+18, 1 ---
float(-1.5707963267948966)
--- testing: -9.2233720368548E+18, -1 ---
float(-1.5707963267948966)
--- testing: -9.2233720368548E+18, 7 ---
float(-1.5707963267948966)
--- testing: -9.2233720368548E+18, 9 ---
float(-1.5707963267948966)
--- testing: -9.2233720368548E+18, 65 ---
float(-1.5707963267948966)
--- testing: -9.2233720368548E+18, -44 ---
float(-1.5707963267948966)
--- testing: -9.2233720368548E+18, 2147483647 ---
float(-1.570796326562066)
--- testing: -9.2233720368548E+18, -2147483648 ---
float(-1.5707963270277272)
--- testing: -9.2233720368548E+18, 9223372036854775807 ---
float(-0.7853981633974483)
--- testing: -9.2233720368548E+18, -9223372036854775808 ---
float(-2.356194490192345)
