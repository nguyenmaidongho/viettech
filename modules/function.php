<?php
function sanitize_output($buffer) {
    $search = array('/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s');
    $replace = array('>','<','\\1');
    $buffer = preg_replace($search, $replace, $buffer);
    return $buffer;
}
function renameTitle($string) { 
    $search = array ( 
        '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#', 
        '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#', 
        '#(ì|í|ị|ỉ|ĩ)#', 
        '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#', 
        '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#', 
        '#(ỳ|ý|ỵ|ỷ|ỹ)#', 
        '#(đ)#', 
        '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#', 
        '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#', 
        '#(Ì|Í|Ị|Ỉ|Ĩ)#', 
        '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#', 
        '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#', 
        '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#', 
        '#(Đ)#', 
        '/[^a-zA-Z0-9\-\_]/', 
     ) ; 
    $replace = array ( 
        'a', 
        'e', 
        'i', 
        'o', 
        'u', 
        'y', 
        'd', 
        'A', 
        'E', 
        'I', 
        'O', 
        'U', 
        'Y', 
        'D', 
        '-', 
     ) ; 
    $string = preg_replace($search, $replace, $string); 
    $string = preg_replace('/(-)+/', '-', $string); 
            $string = strtolower($string); 
    return $string;
}
function returnArray($string){
    $string = preg_replace('/\s+/', '', $string);
    if(strpos($string,';') !== false){
        $arString = array_filter(explode(';', $string));
        return $arString;
    }else{
        $string = array($string);
        return $string;
    }
}
function returnWhere($string,$data,$where){
    if($data == $where){
        return $string;
    }
}
function returnNotWhere($string,$data,$where){
    if($data !== $where){
        return $string;
    }
}
function timeNow(){
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $now = date('d/m/Y H:i:s');
    return $now;
}
function renameLink($title,$id){
    return renameTitle($title).'-'.$id.'.html';
}
function renameLinkParent($title,$id){
    return renameTitle($title).'-'.$id.'.html';
}
function pageUrl(){
    return 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}
function convertLinkYoutube($url){
    if (strpos($url, 'https://www.youtube.com/embed/') !== FALSE){
        $rt = $url;
    }else if(strpos($url, 'https://www.youtube.com/watch?v=') !== FALSE){
        $parts = parse_url($url);
        parse_str($parts['query'], $query);
        $rt = 'https://www.youtube.com/embed/'.$query['v'];
    }
    return $rt;
}
function returnIcon($file){
    switch ($file) {
        case 'content':
            $icon = 'edit';
            break;
        case 'config':
            $icon = 'cog';
            break;
        case 'shop':
            $icon = 'shopping-cart';
            break;
        case 'picture':
            $icon = 'picture-o';
            break;
        case 'video':
            $icon = 'video-camera';
            break;
        case 'home':
            $icon = 'dashboard';
            break;
        case 'lang':
            $icon = 'language';
            break;
        case 'info':
            $icon = 'info';
            break;
        case 'user':
            $icon = 'user';
            break;
        case 'map':
            $icon = 'map-marker';
            break;
        case 'support':
            $icon = 'user';
            break;
        case 'download':
            $icon = 'download';
            break;
        case 'search':
            $icon = 'search';
            break;
        case 'post':
            $icon = 'upload';
            break;
        case 'design':
            $icon = 'paint-brush';
            break;
        case 'news':
            $icon = 'newspaper-o';
            break;
        case 'contact':
            $icon = 'phone';
            break;
        case 'product':
            $icon = 'list-alt';
            break;
        default:
            $icon = 'file-text';
            break;
    }
    return 'fa fa-'.$icon;
}
function checkObject($object,$key,$value){
    foreach($object as $data){
        if($value == $data->$key){
            return true;
        }
    }
}
function listMenuChild($listMenuChild,$table,$col){
    foreach ($listMenuChild as $menuChild) {
        $listMenuChildChild = $db->list_data_where($table,$col,$menuChild->id);
        if(count($listMenuChildChild)){
            array_push($listMenuChild, $listMenuChildChild);
        }
    }
}
function linkMenu($menu){
    $link = 'href="'.renameTitle($menu->title).'.html" ';
    $link.= 'data-name="'.$menu->name.'" ';
    $link.= 'data-title="'.$menu->title.'" ';
    return $link;
}
function linkIdList($menu,$name){
    $link = 'data-name="'.$name.'" ';
    $link.= 'data-idList="'.$menu->id.'" ';
    $link.= 'data-title="'.$menu->title.'" ';
    $link.= 'href="'.$name.'/danh-muc/'.renameLinkParent($menu->title,$menu->id).'" ';
    return $link;
}
function linkId($data,$name){
    $link = 'data-id="'.$data->id.'" ';
    $link.= 'data-name="'.$name.'" ';
    $link.= 'data-title="'.$data->title.'" ';
    $link.= 'href="'.$name.'/'.renameLink($data->title,$data->id).'" ';
    return $link;
}
/*===================================*/
function linkAdd($table,$parent = '',$id = ''){
    $link = 'data-action="add" ';
    $link.= 'data-table="'.$table.'" ';
    if($parent !== '' && $id !== ''){
        $link.= 'data-'.$parent.'="'.$id.'" ';
    }
    $link.= 'class="btn btn-info btnAjax" ';
    $link.= 'type="button" ';
    return $link;
}
function linkAddMenu($id){
    $link = 'data-action="add" ';
    $link.= 'data-table="menu" ';
    $link.= 'data-menu_parent="'.$id.'" ';
    $link.= 'class="btn btn-info btnAjax" ';
    $link.= 'type="button" ';
    return $link;
}
function linkAddId($id){
    $link = 'data-action="add" ';
    $link.= 'data-table="data" ';
    $link.= 'data-menu="'.$id.'" ';
    $link.= 'class="btn btn-info btnAjax" ';
    $link.= 'type="button" ';
    return $link;
}
function linkAddIdData($id){
    $link = 'data-action="add" ';
    $link.= 'data-table="data" ';
    $link.= 'data-data_parent="'.$id.'" ';
    $link.= 'class="btn btn-info btnAjax" ';
    $link.= 'type="button" ';
    return $link;
}
/*===================================*/
function linkDelMenu($id){
    $link = 'data-action="del" ';
    $link.= 'data-table="menu" ';
    $link.= 'data-value="'.$id.'" ';
    $link.= 'class="btn btn-danger btnAjax confirm" ';
    $link.= 'type="button" ';
    return $link;
}
function linkDelId($id){
    $link = 'data-action="del" ';
    $link.= 'data-table="data" ';
    $link.= 'data-value="'.$id.'" ';
    $link.= 'class="btn btn-danger btnAjax confirm" ';
    $link.= 'type="button" ';
    return $link;
}
function linkDel($table,$id){
    $link = 'data-action="del" ';
    $link.= 'data-table="'.$table.'" ';
    $link.= 'data-value="'.$id.'" ';
    $link.= 'class="btn btn-danger btnAjax confirm" ';
    $link.= 'type="button" ';
    return $link;
}
function checkShowFile($name){
    $rt = true;
    $listFile = ['home','config'];
    foreach($listFile as $file){
        if($name == $file){
            $rt = false;
        }
    }
    return $rt;
}
function angleDown($listData){
    $rt = '';
    if(count($listData)){
        $rt = '<i class="fa fa-angle-down"></i>';
    }
    return $rt;
}
function angleRight($listData){
    $rt = '';
    if(count($listData)){
        $rt = '<i class="fa fa-angle-right"></i>';
    }
    return $rt;
}
function srcImg($data){
    if($data->title == ''){
        $data->title = $data->img;
    }
    if(isset($data->img) && ($data->img !== '')){
        $img = baseUrl.'upload/'.$data->img;
    }else{
        $img = baseUrl.'admin/assets/images/404.png';
    }
    return 'src="'.$img.'" alt="'.$data->title.'" title="'.$data->title.'" ' ;
}
function checkLength($text,$data = 'Liên hệ'){
    if($text == '' || $text == '0'){
        echo $data;
    }else{
        echo $text;
    }
}
function showCookie($name){
    if(isset($_COOKIE['user_'.$name])) echo $_COOKIE['user_'.$name];
}
function showCookieUser($user,$check,$name){
    if($check){
        if(isset($user->$name) && strlen($user->$name)){
            $rt = $user->$name;
        }else{
            $rt = showCookie($name);
        }
    }else{
        $rt = showCookie($name);
    }
    return $rt;
}
function checkCookieUser($user,$email,$password){
    if(isset($user) && $user && $user->email == $email && $user->password == $password){
        return true;
    }else{
        return false;
    }
}
function linkSearch($menu,$q){
    $link = 'href="'.$menu->name.'.html?'.$q.'" ';
    $link.= 'data-name="'.$menu->name.'" ';
    $link.= 'data-title="'.$menu->title.'" ';
    $link.= 'data-q="'.$q.'" ';
    return $link;
}
function watermark($SourceFile, $WatermarkFile, $SaveToFile = NULL) 
{ 
    $watermark = @imagecreatefrompng($WatermarkFile) 
    or exit('Cannot open the watermark file.'); 
    imageAlphaBlending($watermark, false); 
    imageSaveAlpha($watermark, true); 
    $image_string = @file_get_contents($SourceFile) 
    or exit('Cannot open image file.'); 
    $image = @imagecreatefromstring($image_string) 
    or exit('Not a valid image format.'); 
    $imageWidth=imageSX($image); 
    $imageHeight=imageSY($image); 
    $watermarkWidth=imageSX($watermark); 
    $watermarkHeight=imageSY($watermark); 
    $coordinate_X = ( $imageWidth - 5) - ( $watermarkWidth); 
    $coordinate_Y = ( $imageHeight - 5) - ( $watermarkHeight); 
    imagecopy($image, $watermark, $coordinate_X, $coordinate_Y, 
        0, 0, $watermarkWidth, $watermarkHeight); 
    if(!($SaveToFile)) header('Content-Type: image/jpeg'); 
    imagejpeg ($image, $SaveToFile, 100); 
    imagedestroy($image); 
    imagedestroy($watermark); 
    if(!($SaveToFile)) exit; 
}
function srcLogo($infoPage,$logo = 'banner'){
    echo "src='upload/".$infoPage->$logo."' title='".$infoPage->title."' alt='".$infoPage->title."'";
}
function convertToObject($array) {
    $object = new stdClass();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $value = convertToObject($value);
        }
        $object->$key = $value;
    }
    return $object;
}
function showCaptcha(){
    require_once('recaptchalib.php');
    echo recaptcha_get_html('6LdyfQsUAAAAAJADYUcOwnfJbdZpJlZ-BsgA7Zj4');
}
function showComment(){
    ?>
    <div class="fb-comments" data-href="<?=pageUrl(); ?>" data-width="100%" data-numposts="5"></div>
    <?php
}
function rmkdir($path) {
    $path = explode('/', $path);
    $rebuild = '';
    foreach($path as $p) {
        $rebuild .= "$p/";
        if(!is_dir($rebuild) && (!strpos($rebuild,'html'))) mkdir($rebuild,0777,true);
    }
}
?>
