<?php

function make_menuleft()
{
    $grupaccess = isset(Yii::app()->session['lst_grup_pengguna'])? Yii::app()->session['lst_grup_pengguna']:0;
    $menu = Yii::app()->session['menu'];

    $sql = "select a.*
            from tbl_menu a
            left join tbl_menu_grup b on (a.id_menu = b.menu_id)
            where a.parent_menu = 0
                and b.grup_id in ($grupaccess)
                and a.status = 1
            GROUP BY a.id_menu
            order by a.urutan";
    $menunav = "";
    $query = Yii::app()->db->createCommand($sql)
            ->queryAll();
    foreach($query as $row) {

        $stIcon = '<i class="fa '.$row['icons'].'"></i> ';
        $class = ($menu==$row['id_menu'])?' class="open" ':'';
        if(toogle($row['id_menu'],$grupaccess) > 0){
            $menunav .= "<li $class>";
            $menunav .='<a href="javascript:void(0)">'.$stIcon.'
						<span class="title"> '.$row['nama_menu'].' </span><i class="icon-arrow"></i>
					</a>';
        }
        else
        {
            $menunav .= "<ul class=\"sub-menu\">";
            $menunav .='<a href="javascript:void(0)">'.$stIcon.'
						<span class="title"> '.$row['nama_menu'].' </span>
					</a>';
        }
        $menunav .=	formatTreeLeft($row['id_menu'],$grupaccess,$class);
        $menunav .= "</li>";
    }
    $menunav.= "";
    return $menunav;
}

function formatTreeLeft($id_parrent, $s_access,$class)
{
    $nameUrl= Yii::app()->urlManager->parseUrl(Yii::app()->request);
    $sql = " select a.*
				from tbl_menu a
				left join tbl_menu_grup b on (a.id_menu = b.menu_id)
				where a.parent_menu = $id_parrent
				and b.grup_id in ($s_access)
				and a.status = 1
				GROUP BY a.id_menu
				order by a.urutan";
    $query = Yii::app()->db->createCommand($sql)
                ->queryAll();
    $style = empty($class)?"": 'style="display: block;"';
    $menunav = "<ul class='sub-menu' $style>";
    foreach($query as $item){
        $cldss ="";
        if ($nameUrl===$item['link'])
        {
            $cldss="class='active'";
        }
        if(toogle($item['id_menu'],$s_access) > 0){
            $menunav .= "<li $cldss>";
            $menunav .= CHtml::link('<span class="title"> ' . $item['nama_menu'] . '</span>',array($item['link']));
            //$menunav .= '<a href="' . 'index.php?r='.$item['link'] . '" ><span class="title"> ' . $item['nama_menu'] . '</span></a>';
        }else{
            $menunav .= "<li $cldss>";
            //$menunav .= '<a href="' . 'index.php?r='.$item['link'] . '"><span class="title"> ' . $item['nama_menu'] . '</span></a>';
            $menunav .= CHtml::link('<span class="title"> ' . $item['nama_menu'] . '</span>',array($item['link']));
        }
        $menunav.= formatTreeLeft($item['id_menu'],$s_access,$class);
        $menunav.= "</li>";

    }

    $menunav.= "</ul>";
    return $menunav;
}

function toogle($id_parrent, $s_access){
    $sql = " select a.*
            from tbl_menu a
            left join tbl_menu_grup b on (a.id_menu = b.menu_id)
            where a.parent_menu = $id_parrent
                and b.grup_id in ($s_access)
                and a.status
            GROUP BY a.id_menu = 1
            order by a.urutan";
    $queryw = Yii::app()->db->createCommand($sql)
            ->queryAll();
    return count($queryw);
}

function convertType($ctype){
    if (substr($ctype,0, 3)=="int")
        return "INT";
    if (substr($ctype,0, 3)=="varchar")
        return "VARCHAR";
    if (substr($ctype,0, 6)=="double")
        return "DOUBLE";

    return strtoupper($ctype);
}

