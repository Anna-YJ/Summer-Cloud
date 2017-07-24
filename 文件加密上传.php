//  加密上传文件 
    $handle = fopen($tempName, "r+");
    if($handle)
     {  echo "OK open";}else{  echo "fail open";}

 
    $input1 = fread($handle, filesize($tempName));
    print($input1);

    if(!function_exists("hex2bin")) { // PHP 5.4起引入的hex2bin
    function hex2bin($data) {
        return pack("H*", $data);
       }
    }


// ECB模式加密用不到IV，CBC模式才会用到IV
// 所以IV不管如何随机变化，ECB模式下完全不受IV变化的影响，固定明文输入，确定密文输出

$key = "this";
$td = mcrypt_module_open('tripledes', '', 'ecb', '');
$block_size = mcrypt_enc_get_block_size($td);
$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_DEV_RANDOM);

//var_dump(bin2hex($iv));
mcrypt_generic_init($td, $key, $iv);
$encrypted_data1 = mcrypt_generic($td, $input1);

mcrypt_generic_deinit($td);
mcrypt_module_close($td);

print_r(bin2hex($encrypted_data1)."\n");

fclose($handle);

$handle1 = fopen($tempName, "w");

fwrite($handle1,$encrypted_data1);

fclose($handle1);
