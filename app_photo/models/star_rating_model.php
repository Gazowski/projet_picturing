<?php

class Star_rating_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }


    public function get_rating(){

              // Note de l'utilisateur
      $this->db-> select ('rating');
      $this->db-> from ('rating');
      $this->db-> where ("rated_user", $rated_user);
     // $this->db-> where ("rater_user", $rater_user);
      $userRatingquery = $this->db->get();

      $userpostResult = $userRatingquery->row_array();

      $userRating = 0;
      if (count ($userpostResult)> 0) {
         $userRating = $userpostResult [0] ['rating'];
      }
 
    }


    public function get_rating_average(){

        // Note de l'utilisateur
        $this->db->select ('ROUND (AVG (rating), 1) as averageRating');
        $this->db-> from ('rating');
        $this->db-> where ("rated_user", $rated_user);
        $ratingquery = $this->db->get();

        $userpostResult = $ratingquery->result_array();
        $rating = $userpostResult [0] ['averageRating'];

        if ($rating == '') {
            $rating = 0;
        }

        $user_arr[] = array ("id"=>$id, "first_name"=>$first_name, "last_name"=>$last_name, 
                                "rating"=>$userRating, "averageagerating"=>$cote);
        

        return $user_arr;
        

    }




    public function user_rating( $rated_user, $rating) {
        $this->db->select ('*');
        $this->db-> from ('rating');
        $this->db-> where ("rated_user", $rated_user);
       // $this->db-> where ("rater_user", $rater_user);
        $userRatingquery = $this->db->get();
    
        $userRatingResult = $userRatingquery->result_array();
        if (count ($userRatingResult)> 0) {
    
          $id_rating = $userRatingResult [0] ['id'];
          // Mise à jour
          $value = array('rating' => $rating);
          $this->db->where('id', $id_rating);
          $this->db->update('id_rating', $value);
        }else{
          $userRating = array (
            "rater_user" => $rater_user,
            //"rated_user" => $rated_user,
            "rating" => $rating
          );
    
          $this->db->insert('rating', $userRating);
        }
    
        // Note moyenne
        $this->db->select('ROUND (AVG (rating), 1) as averageRating');
        $this->db->from('rating');
        $this->db- where("rater_user", $rater_user);
        $ratingquery = $this->db->get();
    
        $postResult = $ratingquery->result_array();
    
        $rating = $postResult[0]['averageRating'];
    
        if ($rating == '') {
           $rating = 0;
        }
    
        return $rating;
      }


}
?>