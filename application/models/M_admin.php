<?php

class M_admin extends CI_Model
{
    // ----menggunakan query sql----
    function select_menu_count()
    {
        return $this->db->query("SELECT kode, count(kode) FROM pesanan WHERE status='belum'");
    }
    function select_menu_count_bolean()
    {
        $cek = $this->db->query("SELECT kode, count(kode) FROM pesanan WHERE status='belum'")->num_rows();
        if($cek >= 1)
        {
            return true;
        }
        else {
            return false;
        }
    }
    function select_beetween($table, $where, $dateNow)
    {
        return $this->db->query("select * from ".$table." where ".$where." between '".$dateNow." 00:00:00' and '".$dateNow." 23:59:59'");
    }
    function select_select_beetween($select, $table, $where, $dateNow)
    {
        return $this->db->query('SELECT '.$select.' FROM '.$table.' WHERE '.$where.' between "'.$dateNow.' 00:00:00" and "'.$dateNow.' 23:59:59"');
    }
    function selectsum_select_join_2table_wherebeetween($select, $table, $table2, $on2, $where, $dateNow)
    {
        return $this->db->query("SELECT ".$select." FROM ".$table." LEFT JOIN ".$table2." ON ".$on2." where ".$where." between '".$dateNow." 00:00:00' and '".$dateNow." 23:59:59'");
    }
    // ----/pakaiquery----
    function select_all($table)
    {
        return $this->db->get($table);
    }
    function select_all_order_by($select, $table, $order_by)
    {
       return $this->db->select($select)
        ->from($table)
        ->order_by($order_by)
        ->get();
    }
    function select_where($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    function select_select($select, $table)
    {
        $this->db->select($select);
        return $this->db->get($table);
    }
    function select_select_where($select, $table, $where)
    {
        return $this->db->select($select)
        ->from($table)
        ->where($where)
        ->get();
    }
    function select_select_where_join_2table_type($select, $table1, $table2, $on, $where, $type)
    {
        return $this->db->select($select)
        ->from($table1)
        ->join($table2, $on, $type)
        ->where($where)
        ->get();
    }
    function select_select_where_or_join_2table_type($select, $table1, $table2, $on, $where, $or, $type)
    {
        return $this->db->select($select)
        ->from($table1)
        ->join($table2, $on, $type)
        ->where($where)
        ->or_where($or)
        ->get();
    }
    function select_select_join_2table_type($select, $table1, $table2, $on, $type)
    {
        return $this->db->select($select)
        ->from($table1)
        ->join($table2, $on, $type)
        ->get();
    }
    function select_select_sum_join_2table_type($select, $selectSum, $table1, $table2, $on, $type, $groupBy)
    {
        return $this->db->select($select)
        ->select_sum($selectSum)
        ->from($table1)
        ->join($table2, $on, $type)
        ->group_by($groupBy)
        ->get();
    }
    function select_select_where_join_3table_type($select, $table1, $table2, $on2, $type2, $table3, $on3, $type3, $where)
    {
        return $this->db->select($select)
        ->from($table1)
        ->join($table2, $on2, $type2)
        ->join($table3, $on3, $type3)
        ->where($where)
        ->get();
    }
    function select_select_sum_join_3table_type($select, $selectSum, $table1, $table2, $on2, $type2, $table3, $on3, $type3, $groupBy)
    {
        return $this->db->select($select)
        ->select_sum($selectSum)
        ->from($table1)
        ->join($table2, $on2, $type2)
        ->join($table3, $on3, $type3)
        ->group_by($groupBy)
        ->get();
    }
    function select_select_join_3table_type($select, $table1, $table2, $on2, $type2, $table3, $on3, $type3)
    {
        return $this->db->select($select)
        ->from($table1)
        ->join($table2, $on2, $type2)
        ->join($table3, $on3, $type3)
        ->get();
    }
    function insert_data($table, $data)
    {
        $this->db->insert($table, $data);
    }
    function delete_data($table, $where)
    {
        $this->db->delete($table, $where);
    }
    function update_data($table, $set, $where)
    {
        $this->db->from($table)
        ->where($where)
        ->set($set)
        ->update();
    }
    function insert_batch($table, $data)
    {
        $this->db->insert_batch($table, $data);
    }
	public function updateBatch($table, $set, $where)
	{
		$this->db->update_batch($table ,$set, $where); 
    }
}