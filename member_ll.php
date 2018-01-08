<?
error_reporting(E_ALL);
include ('_dbconfig.php');
include ('_ggFunctions.php');


	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	} else {
		$user = load_user(0);
		$id = $user->id;
	}

	$ls->statusA = array("Active","活跃","活跃");
	$ls->statusB = array("Block","封号","封号");
	$ls->rankMgr = array("Manager","註冊经理","註冊经理");
	$ls->rankMem = array("Member","普通会员","普通会员");

	$ls->nofullname = array("Name Not Set","尚未设定","尚未設定");

	$draw = intval($_POST['draw']);
	$start = intval($_POST['start']);
	$length = intval($_POST['length']);

	if ($_POST['search']['value']<>"") {
		$search = " and username like '%".$_POST['search']['value']."%'";
	} else {
		$search = " ";
	}

	$col = $_POST['order'][0]['column'];
	$dir = $_POST['order'][0]['dir'];
	$fld = $_POST['columns'][$col]['data'];


	$result = array();
	$items = array();

		// Normal Member
		if ($dir=="") {
    	$rs = $db->query("select id, email, fullname, phone,referral,ref_name,manager,mgr_name,rank,username,date_add,last_ph,directs,status  from tblmember where referral=$id $search limit $start,$length");
	  } else {
	    $rs = $db->query("select id, email, fullname, phone,referral,ref_name,manager,mgr_name,rank,username,date_add,last_ph,directs,status  from tblmember where referral=$id $search order by $fld $dir limit $start,$length");
	  }
		$ctr = mysqli_fetch_array($db->query("select count(*) from tblmember where referral=$id"));

	// Add to counter
	$result['draw'] = $draw;
	$result["recordsTotal"] = ($ctr[0]);
	$result["recordsFiltered"] = ($ctr[0]);

	// Add to final result
	while($row = mysqli_fetch_object($rs)){
		$row->rank = ggRank($row->rank,1);
		if ($row->status=="A") {
			$row->status = $ls->statusA[$lang];
		} else if ($row->status == "B") {
			$row->status = $ls->statusB[$lang];
		}
		$row->date_add = substr($row->date_add,0,10);

		$directs = mysqli_fetch_object($db->query("select count(id) as ctr from tblmember where referral=$row->id"));
		$row->directs = $directs->ctr;

		if ($row->fullname == "") {
			$row->fullname = $ls->nofullname[$lang];
		}

		$ph = $db->query("select * from tblhelp where mem_id = $row->id and g_type='P' and status='O' order by id limit 0,1");
		$phc = mysqli_num_rows($db->query("select * from tblhelp where mem_id = $row->id and g_type='P' and status='O'"));
		$row->ph = "";
		while ($ph1 = mysqli_fetch_object($ph)) {
			$row->ph = $ph1->g_amount. ' ' .$ph1->g_date;
			if ($phc>1) {
				$row->ph .= ' - <b class=blue>'.$phc. ' PH</b>';
			}
		}
		array_push($items, $row);
	}
	$result["data"] = $items;

	echo json_encode($result);

?>