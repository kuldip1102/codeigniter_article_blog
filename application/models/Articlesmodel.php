<?php 

class Articlesmodel extends CI_Model{

	public function article_list($limit,$offset)
	{
		$user_id = $this->session->userdata('user_id');
		$query = $this->db->select(['title','id'])
						  ->from('article')
						  ->where('user_id',$user_id)
						  ->limit($limit,$offset)
						  ->get();
		return $query->result();
	}

	public function add_article($array){
		return $this->db->insert('article',$array);
	}

	public function num_rows(){
				$user_id = $this->session->userdata('user_id');
		$query = $this->db->select(['title','id'])
						  ->from('article')
						  ->where('user_id',$user_id)
						  ->get();
		return $query->num_rows();
	}

	public function find_article($article_id){
		$q = $this->db->select(['id','title','body'])
				 ->where('id',$article_id)
				 ->get('article');
		return $q->row();
	}

	public function update_article($article_id,array $article){
		return $this->db->where('id',$article_id)
				->update('article',$article);
	}

	public function delete_model($article_id){
		return $this->db->delete('article',['id'=>$article_id]);
	}

	public function all_articles(){
		$query = $this->db->select(['title','id'])
						  ->from('article')
						  ->get();
		return $query->num_rows();
	}

	public function all_article_list($limit,$offset)
	{
		$query = $this->db->select()
						  ->from('article')
						  ->limit($limit,$offset)
						  ->get();
		return $query->result();
	}

	 public function search($query){
	 	$q = $this->db->from('article')
	 				  ->like('title',$query)
	 				  ->get();
	 	return $q->result();
	 }

}

?>