<?php

function abbreviate($inf,$id,$table,$length){

	$inf = preg_replace("[<.*?>]",'',$inf);

    if (preg_match("/^.{1,$length}\b/s", $inf, $match)){
    	$inf = $match[0];
    }

    $info = $inf."<a href='/$table/$id'> ... read more</a>";
    
    return $info;
}

function addressString($suite,$lotnmbr,$stnmbr,$street,$suburb,$pc,$state){
	$adr = '';
	if(strlen($suite)){
		$adr .= $suite." ";
	}
	if(strlen($stnmbr)){
		$adr .= $stnmbr." ";
	}
	elseif(strlen($lotnmbr)){
			$adr .= $lotnmbr." ";
	}
	if(strlen($street)){
		$adr .= $street.", ";
	}
	if(strlen($suburb)){
		$adr .= $suburb.". ";
	}
	if(strlen($pc)){
		$adr .= $pc;
	}
	if(strlen($state)){
		$state = strtoupper($state);
		$adr .= " ".$state;
	}
	return $adr;
}

#formatted
function address($suite,$lotnmbr,$stnmbr,$street,$suburb,$pc,$state){
	$adr = '';
	if(strlen($suite)){
		$adr .= $suite."<br />";
	}
	if(strlen($stnmbr)){
		$adr .= $stnmbr." ";
	}
	elseif(strlen($lotnmbr)){
			$adr .= $lotnmbr." ";
	}
	if(strlen($street)){
		$adr .= $street.",<br />";
	}
	if(strlen($suburb)){
		$adr .= $suburb.". ";
	}
	if(strlen($pc)){
		$adr .= $pc;
	}
	if(strlen($state)){
		$state = strtoupper($state);
		$adr .= " ".$state;
	}
	return $adr;
}

function bigSmall($path,$name,$ext){
    $big 	= preg_replace('/150/', '1800', $path); 
    $small 	= preg_replace('/1800/', '600', $big); 
    $big 	= "$big/$name.$ext";
    $small	= "$small/$name.$ext"; 
    return [$big,$small];
}

use App\Models\Article;
use App\Models\People_pl;
use App\Models\Street;
use App\Models\Pimage;

function getImage($file,$type)   //  $table,$tblid,$id,$type)
{  $caption ='';
    if(isset($file->type)){
        $image = preg_replace('/width="100%"/','style="max-height:200px"',$file->ppimage);
        $article = abbreviate($file->biography, $file->ppid, 'people_pls', 300);
        $caption = '<span class="caption">'.$file->ppcaption.'</span>';

    }
    else{
        if(!empty($file->artimage)){
            $image = preg_replace('/width="100%"/','style="max-height:200px"',$file->artimage);
            $caption = '<span class="caption">'.$file->artcaption.'</span>';
        } 
        else{ 
            if(preg_match("/<img src=.*?>/",$file->article,$matches)){
            
                $image = preg_replace('/width="100%"/','style="max-height:200px"',$matches[0]);
                if(preg_match('/<span class="caption">.*?<.span>/', $file->article,$match)){
                    $caption = $match[0];
                }
            }
            else{
                $image = '';
                $caption = '';
            }
        }
        $article = abbreviate($file->article, $file->artid, 'articles', 300);
       
    }

    $filearray = array($file, $image, $article, $caption);

    return $filearray;
}

function imagesize($path,$name,$ext){

    $fullName = $name.'.'.$ext;
    $big    = preg_replace('/200/', '1800', $path); 
    $small  = preg_replace('/1800/', '200', $big); 
    $big    = "$big/$fullName";
    $small  = "$small/$fullName"; 
    $thumb  = "$path/$fullName";
    $width  = '100%';
    $file = public_path("$small");
    list($w,$h) = getimagesize($file);	
    if($h>$w){$width = $w / $h * 100; };  
    $width = "$width%"; 
    $width = preg_replace('/%%/','%', $width);
    
    return [$big,$small,$width];
}

function imageWidth($img)
{
    if(!empty($img) && strlen($img) < 100 )
    {
        list($w,$h) = getimagesize("/Volumes/4tb/sites/planningmelbourne/public$img");
       
        if($h>$w)
        {
            $width = $w / $h * 100; 
            $width = "$width%"; 
        }
        else{
            $width="100%";
        }

        return $width;
    } 
    
}

function nextBook($mdl,$fld,$fldval,$relatedfld,$rfval){
	if(preg_match('/Akimage/', $mdl) || preg_match('/Chapter/', $mdl)){ 
		$chapter = $mdl::distinct($relatedfld)->get([$relatedfld])->pluck($relatedfld);
		$pos = $chapter->search($rfval);

		list($prev,$next) = nextPrevious($pos,$chapter);

		$p = $mdl::where($relatedfld,$prev)->first();
		$p = $p->$fld;
		$n = $mdl::where($relatedfld,$next)->first();
		$n = $n->$fld;
	}
	else{
		$chapter = $mdl::distinct()->where($relatedfld, $rfval)->orderBy($fld)->get([$fld])->pluck($fld);
		$pos = $chapter->search($fldval);	

		list($prev,$next) = nextPrevious($pos,$chapter);	

		$p = $mdl::where($fld,$prev)->first();
		$n = $mdl::where($fld,$next)->first();
	}
	return [$p,$n];
}

function nextChapter($mdl,$fld,$fldval,$id ){

	if(empty($id)){$id = $fld;}
	
	$bk = $mdl::distinct()->orderBy($id)->get([$fld])->pluck($fld);
	$pos = $bk->search($fldval);

	list($prev,$next) = nextPrevious($pos,$bk);

	$prev = $mdl::where($fld,$prev)->first();
	$prev = $prev->$fld;
	$next = $mdl::where($fld,$next)->first();
	$next = $next->$fld;
	
	return [$prev,$next];
}

function nextPrevious($pos,$chapter){

	$prev = $chapter[$pos];
	$next = $chapter[$pos];

	if($pos>0){ 
	    $prev = $chapter[$pos-1];
	}
	if($pos<=count($chapter)-2){
	    $next = $chapter[$pos+1];
	}	

	return [$prev,$next];
}

function parseImage($img)
{
    preg_match('/".*?"/',$img,$matches);
    if(strpos($matches[0],'.')){
        $img = $matches[0];
    }
    preg_replace('/"/',$img,'');
    str_replace( '/','',$img,1);

    $ary = explode('/',$img);

    $ext = end($ary);
    array_pop($ary);
    $name = end($ary);
    array_pop($ary);
    
    $path = implode('/',$ary);

    $imgPath = array($path,$name,$ext);

    return $imgPath;
}

function searchQuery($req,$mdl){
	if($req->has('search')){
		$r = $req->input('search');
		$sq = $mdl::search($r)->paginate(15); 
	}
	if($req->has('query')){
		$srch = preg_replace('/query/','search',$req['query']);;
		$sq = $mdl::search($srch)->paginate(15);
	}
	
	$num = count($sq);
	return [$sq,$num];
}

function random($table,$id,$type){

    $ary = [];

    if(empty($type))
        $array = $table::get();
    else{
        $array = $table::where('type','<>',$type)->get();
    }

    foreach($array as $a){
        $ary = (array)$ary;
        array_push($ary, $a->$id);
    }

    $d = $ary[rand(0, count($ary)-1)];

    $info = $table::where($id,$d)->first();

    return $info;
    
}