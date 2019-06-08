<?php

class Bread_model extends CI_MODEL {

	/* Functions Below are Used for Reference para may kopyahan ng Codes */
	function get_schools()
	{
		$sql = "SELECT
		 			`id`,
		 			`school_name`
					FROM `schools`";

        $result = $this->db->query($sql);
        return $result->result_array();
	}

	function get_school_rep($school_id)
	{
		$sql = "SELECT
		 			`id`,
		 			`rep_name`
					FROM `representatives` WHERE school_id = $school_id";

        $result = $this->db->query($sql);
        return $result->result_array();
	}

	function get_rep_survey($rep_id)
	{
		$sql = "SELECT id, DATE_FORMAT(created_at, '%a, %M %d %Y %h:%i %p') as 'Date' FROM `survey_result` WHERE rep_id = $rep_id;";

        $result = $this->db->query($sql);
        return $result->result_array();
	}

	function get_rep_survey_details($survey_id)
	{
		$sql = "SELECT sd.survey_id,
						q.question,
						sd.answer_point
						FROM survey_details sd inner join questions q on sd.question_id = q.id WHERE sd.survey_id = $survey_id";

        $result = $this->db->query($sql);
        return $result->result_array();
	}

	function get_categories()
	{
		$sql = "SELECT
		 			`id`,
		 			`category_name`,
		 			`is_deleted`
					FROM `categories` WHERE is_deleted = 0";

        $result = $this->db->query($sql);
        return $result->result_array();
	}

	function get_questions($id)
	{
		$sql = "SELECT
		 			*
		 			FROM questions
		 			WHERE category_id = $id
		 			AND is_deleted = 0";

        $result = $this->db->query($sql);
        return $result->result_array();
	}

	function get_answers($id)
	{
		$sql = "SELECT
		 			*
		 			FROM answers
		 			WHERE question_id = $id
		 			AND is_deleted = 0";

        $result = $this->db->query($sql);
        return $result->result_array();
	}

	function get_questionnaire($id)
	{
		$sql = "SELECT c.category_name,
					q.question,
					a.answers,
					a.val,
					c.id AS category_id,
					q.id AS question_id,
					a.id AS answer_id
					FROM answers a
					LEFT OUTER JOIN questions q
					ON q.id = a.question_id
					LEFT OUTER JOIN categories c
					ON c.id = q.category_id
					WHERE c.is_deleted = 0
					AND q.is_deleted = 0
					AND a.is_deleted = 0
					AND c.id = $id";

        $result = $this->db->query($sql);
        return $result->result_array();
	}

	function set_schoolname($schoolname, $schoolrep)
	{
		$check_sql = "SELECT
		 			id
		 			FROM schools
		 			WHERE school_name = '$schoolname'";
		$check_result = $this->db->query($check_sql);
		if($check_result->num_rows() == 0){
			$sql = "INSERT INTO schools(school_name) VALUES ('$schoolname')";

			$result = $this->db->query($sql);
			$school_id = $this->db->insert_id();
		} else {
			$school_id = $check_result->row('id');
		}

		$check_rep_sql = "SELECT
		 			*
		 			FROM representatives
		 			WHERE rep_name = '$schoolrep' and school_id = (SELECT id from schools where school_name = '$schoolname')";
		$check_rep_result = $this->db->query($check_rep_sql);
		if($check_rep_result->num_rows() == 0){
			$rep_query = "INSERT INTO representatives(rep_name, school_id) values ('$schoolrep', '$school_id')";

			$result = $this->db->query($rep_query);
			return "Success";
		} else {
			return "Failed";
		}
	}

	function set_survey_result($school_name, $schoolrep)
	{
		$sql = "INSERT INTO survey_result(rep_id, created_at) VALUES ((SELECT id from representatives where rep_name = '$schoolrep' and school_id = (SELECT id from schools where school_name = '$school_name')), NOW())";
		$result = $this->db->query($sql);
		return $this->db->insert_id();
	}

	function set_survey_details($survey_id, $question, $point)
	{
		$sql = "INSERT INTO survey_details(survey_id, question_id, answer_point) VALUES ('$survey_id', '$question', '$point')";
		$result = $this->db->query($sql);
	}

	function get_survey_details($survey_id)
	{
		$sql = "SELECT
		 			*
		 			FROM survey_details
		 			WHERE survey_id = $survey_id";

        $result = $this->db->query($sql);
        return $result->result_array();
	}

	function get_survey_result_detailed($survey_id, $points)
	{
		$sql = "SELECT c.id as category_id, c.`category_name`, q.id as question_id, q.`question`, a.`answers`
					FROM `survey_result` sr
					INNER JOIN `survey_details` sd
					ON sr.id = sd.`survey_id` AND sd.`answer_point` = $points
					INNER JOIN `questions` q
					ON q.id = sd. `question_id`
					INNER JOIN `categories` c
					ON c.id = q.`category_id`
					INNER JOIN `answers` a
					ON a.`question_id` = q.id AND a.`val` = $points
					WHERE sr.`id` = $survey_id
					ORDER BY category_id, question_id";

        $result = $this->db->query($sql);
        return $result->result_array();
	}

}
?>
