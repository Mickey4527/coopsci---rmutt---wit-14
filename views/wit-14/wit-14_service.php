<?php
include ROOT . "/views/wit-14/config.php";

$scores = [1, 2, 3, 4, 5];

function getQue()
{
    try {
        $sql = 'SELECT wit_que.que_id, wit_que.que_header, wit_que.que_is_course, wit_que.que_cat, wit_que.wit_type, wit_cat.cat_name FROM wit_que JOIN wit_cat ON wit_cat.cat_id = wit_que.que_cat WHERE wit_que.wit_type = 1';
        $result = mysqli_query(DB_CONN, $sql);
        $questions = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $cat = $row['que_cat'];
                $id = $row['que_id'];
                $cat_name = $row['cat_name'];
                $question = $row['que_header'];
                $question_number = explode('_', $id)[1];

                // Add question to the appropriate category
                $questions[$cat]['cat'] = $cat;
                $questions[$cat]['title'] = $cat_name;
                $questions[$cat]['detail'][$id] = [
                    'id' => $id,
                    'question' => $question_number,
                    'title' => $question,
                ];
            }
        }
        return $questions;
    } catch (Exception $e) {
        return false;
    }
}

function getTableWIT14($scores, $content)
{
    if (!$content) {
        $content = '<tr><td colspan="6">ข้อผิดพลาดในการดึงข้อมูล</td></tr>';
    }

    $table = '<table class="table">';

    $table .= '<thead class="text-center"><tr class="table-primary"><th style="vertical-align : middle;text-align:center;" rowspan="2">หัวข้อการประเมิน</th><th colspan="5" >ระดับคะแนน</th></tr>';
    $table .= '<tr class="table-primary">';
    foreach ($scores as $score) {
        $table .= '<th scope="col" >' . $score . '</th>';
    }
    $table .= '</tr></thead>';
    $table .= $content;
    $table .= '</table>';
    return $table;
}

function getScoresFromDB($conn)
{
    $sql = 'SELECT score_id, score_value FROM wit_score';
    $result = mysqli_query($conn, $sql);
    $scores = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $scores[] = $row['score_value'];
        }
    }
    return $scores;
}

// column header is score and row header is question. if question is 1.1, 1.2, 1.3, new row will be created for each question
// and radio button will be created for each score.

function getContentTable($num_que, $scores, $post_data)
{

    if (!$num_que) {
        return false;
    }

    $table = '';

    foreach ($num_que as $key => $value) {
        $table .= '<tr><td colspan="' . (count($scores) + 1) . '"><span class="fw-bold">' . $value['cat'] . '. ' . $value['title'] . '</span></td></tr>';
        foreach ($value['detail'] as $val) {
            $table .= '<tr>';
            $table .= '<td><span class="fw-bold ms-3">' . str_replace('_', '.', $val['id']) . '.</span> ' . $val['title'] . '</td>';
            foreach ($scores as $score) {
                $table .= '<td class="text-center"><input class="form-check-input" type="radio" name="' . $val['id'] . '" value="' . $score . '" ' . (isset($post_data[$val['id']]) && $post_data[$val['id']] == $score ? 'checked' : '') . '></td>';
            }
            $table .= '</tr>';
        }
    }
    $table .= '</table>';

    return $table;
}
?>