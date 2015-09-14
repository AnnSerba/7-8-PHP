<?php
/**
 * Created by PhpStorm.
 * User: StarWind
 * Date: 26.05.2015
 * Time: 10:32
 */

class FormValidation {
    protected $rules = [];
    protected $errors = [];
    public function setRule($field_name, $validator_name){
        $this->rules[$field_name] = $validator_name;
        return $this;
    }

    public function validate($post_array){
        foreach ($this->rules as $key => $value){
            $matches = preg_match($value, $post_array[$key]);
            if ($matches == 0)
                $this->errors[$key] = "Поле заполнено неверно";
        }
    }

    public function showErrors(){
        $errors = "<div class='alert ";
        if (count($this->errors) == 0) {
            $errors .= "alert-success'>";
            $errors .= "<p> Ваше сообщение было отправлено </p>";
        }
        else {
            $errors .= "alert-warning'>";
            foreach ($this->errors as $error => $value) {
                $errors .= "<p> Error: " . $error . ": " . $value . "</p>";
            }
        }
        return $errors . "</div>";
    }
}

class TestValidation extends FormValidation {
    public function checkTests($post_array){
        $valid = true;
        if ($post_array['quest1'] != "Leonard Nimoy") {
            $this->errors['Первый ответ'] = "Неверно. Смотри Star Trek! Ответ в том, что сабж внешне схож с одним из преподов...";
            $valid = false;
        }
        if ($post_array['quest2'] != 1) {
            $this->errors['Второй ответ'] = "Неверно. Не смешно.";
            $valid = false;
        }
        if (isset($post_array['checkboxone']) == false || isset($post_array['checkboxtwo']) == true || isset($post_array['checkboxthree']) == true) {
            $valid = false;
            $this->errors['Третий ответ'] = "Неверно. Ну вот ваще несмешно";
        }
        if ($valid) {
            return "<p>Тест пройден.</p> <img src = \"images/nimoy.jpg\" width='500px' height='300px'>";
        }
    }
}
?>
