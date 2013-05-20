<?php

class Bible_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function book_name($book_id, $language)
    {
        if (!isset($book_id)) return;
        if (!isset($language)) return;

        /* 待修正資安問題 */
        $tbl_name = 'book_' . $language;

        /* DB opreations */
        $this->db->select('name')->from($tbl_name)->where('id', $book_id)->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            return $row->name;
        }
    }

    function book_id_by_abbr($book_abbr)
    {
        if (!isset($book_abbr)) return;

        $tbl_name = 'book_english';

        /* DB opreations */
        $this->db->select('id')->from($tbl_name)->like('abbreviation_3', $book_abbr)->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            return $row->id;
        }

        /* DB opreations */
        $this->db->select('id')->from($tbl_name)->like('alternate', $book_abbr)->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            return $row->id;
        }
    }

    function book_abbr_by_id($book_id)
    {
        if (!isset($book_id)) return;

        $tbl_name = 'book_english';

        /* DB opreations */
        $this->db->select('abbreviation_3')->from($tbl_name)->where('id', $book_id)->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            return strtolower($row->abbreviation_3);
        }

        /* DB opreations */
        $this->db->select('alternate')->from($tbl_name)->where('id', $book_id)->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            return strtolower($row->abbreviation_3);
        }
    }

    function read_by_serial(array $serial)
    {
        if (!isset($serial)) return;

        $book = $this->bible->book_id_by_abbr($serial[0]);
        $chapter = $serial[1];
        $verse = $serial[2];

        $tbl_name = 'bible_original';

        /* DB opreations */
        $this->db->select('word')->from($tbl_name)->where('book', $book)->where('chapter', $chapter)->where('verse', $verse);
        $query = $this->db->get();

        $words_array = array();
        foreach ($query->result() as $row) {
            $words_array[] = $row->word;
        }

        return $words_array;
    }

    function translation_by_serial_version($serial, $version)
    {
        if (!isset($serial)) return;

        $book = $this->bible->book_id_by_abbr($serial[0]);
        $chapter = $serial[1];
        $verse = $serial[2];

        /* 待修正資安問題 */
        $tbl_name = 'bible_' . $version;
        $select_obj = 'words';
        $where_book = 'book ';
        $where_chapter = 'chapter';
        $where_verse = 'verse';

        /* 手動判斷資料庫結構... */
        if ($version === 'cjb') {
            $select_obj = 'Scripture';
            $where_book = 'Book ';
            $where_chapter = 'Chapter';
            $where_verse = 'Verse';
        }
        if ($version === 'cunp') {
            $select_obj = 'txt';
            $where_book = 'engs';
            $where_chapter = 'chap';
            $where_verse = 'sec';
        }

        /* DB opreations */
        $this->db->select($select_obj)->from($tbl_name)->where($where_book, $book, 'after')->where($where_chapter, $chapter)->where($where_verse, $verse)->limit(1);
        $query = $this->db->get();
        //print $this->db->last_query();
        foreach ($query->result() as $row) {
            return $row->$select_obj;
        }

        $book = substr($serial[0], 0, 2);

        $this->db->select($select_obj)->from($tbl_name)->like($where_book, $book, 'after')->where($where_chapter, $chapter)->where($where_verse, $verse)->limit(1);
        $query = $this->db->get();
        //print $this->db->last_query();
        foreach ($query->result() as $row) {
            return $row->$select_obj;
        }

    }

    function make_message($words_array)
    {
        if (!isset($words_array)) return;

        $message = '';

        foreach ($words_array as $row) {
            $message .= $row;
        }

        return $message;
    }

    function strongs_number($word)
    {
        $tbl_name = 'bible_original';

        /* 手工修正...應該用移到 DB */
        $problem = array(
            'לָהֶ֜ם' => '9001',
            'לָכֶ֜ם' => '9001',
            'לָכֶ֥ם' => '9001',
            'ב֖וֹ' => '9002',
            'בּ֥וֹ' => '9002'
        );

        foreach ($problem as $key => $value) {
            if ($key === $word) {
                return $value;
            }
        }

        /* DB opreations */
        $this->db->select('strongs')->from($tbl_name)->where('word', $word)->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            return $row->strongs;
        }
    }

    function strongs_version($words_array)
    {
        if (!isset($words_array)) return;

        $words_with_strongs = array();

        foreach ($words_array as $word) {
            $item['strongs'] = $this->strongs_number($word);
            $item['word'] = $word;

            $words_with_strongs[] = $item;
        }

        return $words_with_strongs;
    }

    function translation_pos($pos, $language='zh-hant')
    {
        if (!isset($pos)) return;

        $text = array(
            'v' => '動詞',
            'n' => '名詞',
            'a' => '形容詞',
            'adv' => '副詞',
            'n-f' => '陰性名詞',
            'n-m' => '陽性名詞',
            'r' => '代詞',
            'prt' => '分詞',
            'prep' => '介系詞',
            'conj' => '連接詞',
            'n-pr-m' => '陽性專有名詞（人名）',
            'n-pr-f' => '陰性專有名詞（人名）',
            'n-pr' => '專有名詞（神名）'

        );

        if (isset($text[$pos]))
            return $text[$pos];
        else
            return $pos;
    }

    function part_of_speech($strongs, $language)
    {
        if (!isset($strongs)) return;
        if (!isset($language)) return;

        /* 待修正資安問題 */
        $tbl_name = 'lexicon_' . $language;

        /* DB opreations */
        $this->db->select('part_of_speech')->from($tbl_name)->where('strongs', $strongs)->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $pos = $row->part_of_speech;
            return $this->translation_pos($pos);
        }
    }

    /* 英文解釋 */
    function usage_text($strongs, $language)
    {
        if (!isset($strongs)) return;
        if (!isset($language)) return;

        /* 待修正資安問題 */
        $tbl_name = 'lexicon_' . $language;

        /* DB opreations */
        $this->db->select('usage')->from($tbl_name)->where('strongs', $strongs)->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            return $row->usage;
        }
    }

    function lexicon_data($strongs, $language='hebrew')
    {
        if (!isset($strongs)) return;
        if (!isset($language)) return;

        /* 待修正資安問題 */
        $tbl_name = 'lexicon_' . $language;

        /* DB opreations */
        $this->db->select('data')->from($tbl_name)->where('strongs', $strongs)->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $data = json_decode($row->data);
            return $data;
        }
    }

    function word_by_strongs($strongs, $language='hebrew')
    {
        if (!isset($strongs)) return;
        if (!isset($language)) return;

        /* 待修正資安問題 */
        $tbl_name = 'lexicon_' . $language;

        /* DB opreations */
        $this->db->select('base_word')->from($tbl_name)->where('strongs', $strongs)->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            return $row->base_word;
        }

    }

    function make_lexicon($words_array, $language='hebrew')
    {
        if (!isset($words_array)) return;

        $lexicon_array = array();

        foreach ($words_array as $word) {
            $strongs = $this->strongs_number($word);
            $data = $this->lexicon_data($strongs, $language);
            if (!empty($data)) {
                $item['word'] = $this->word_by_strongs($strongs);
                $item['strongs'] = $strongs;
                $item['part_of_speech'] = $this->part_of_speech($strongs, $language);
                $item['def'] = $data->def->short;
                $item['deriv'] = $data->deriv;
                $item['sbl'] = $data->pronun->sbl;

                $lexicon_array[] = $item;
            }
        }

        return $lexicon_array;
    }

    function next_serial($serial)
    {
        if (!isset($serial)) return;

        $next_serial = array();
        $next_serial[0] = $this->bible->book_id_by_abbr($serial[0]);
        $next_serial[1] = $serial[1];
        $next_serial[2] = $serial[2];

        $next_serial[2] += 1;

        $tbl_name = 'bible_original';

        /* 找看看下一節有無資料 */
        /* DB opreations */
        $this->db->select('verse')->from($tbl_name)->where('book', $next_serial[0])->where('chapter', $next_serial[1])->where('verse', $next_serial[2])->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            if (isset($row->verse)) {
                $next_serial[0] = $this->bible->book_abbr_by_id($next_serial[0]);
                return $next_serial;
            }
        }

        /* 改找下一章 */
        $next_serial[1] += 1;
        $next_serial[2] = 1;
        /* DB opreations */
        $this->db->select('verse')->from($tbl_name)->where('book', $next_serial[0])->where('chapter', $next_serial[1])->where('verse', $next_serial[2])->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            if (isset($row->verse)) {
                $next_serial[0] = $this->bible->book_abbr_by_id($next_serial[0]);
                return $next_serial;
            }
        }

        /* 改找下一本 */
        $next_serial[0] += 1;
        $next_serial[1] = 1;
        $next_serial[2] = 1;
        /* DB opreations */
        $this->db->select('verse')->from($tbl_name)->where('book', $next_serial[0])->where('chapter', $next_serial[1])->where('verse', $next_serial[2])->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            if (isset($row->verse)) {
                $next_serial[0] = $this->bible->book_abbr_by_id($next_serial[0]);
                return $next_serial;
            }
        }

        /* 沒有下一節（到最後面了） */
        return array();
    }

    function prev_serial($serial)
    {
        if (!isset($serial)) return;

        $next_serial = array();
        $next_serial[0] = $this->bible->book_id_by_abbr($serial[0]);
        $next_serial[1] = $serial[1];
        $next_serial[2] = $serial[2];

        $next_serial[2] -= 1;

        $tbl_name = 'bible_original';

        /* 找看看上一節有無資料 */
        /* DB opreations */
        $this->db->select('verse')->from($tbl_name)->where('book', $next_serial[0])->where('chapter', $next_serial[1])->where('verse', $next_serial[2])->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            if (isset($row->verse)) {
                $next_serial[0] = $this->bible->book_abbr_by_id($next_serial[0]);
                return $next_serial;
            }
        }

        $next_serial[2] = $serial[2];
        /* 取得本節 id */
        $this->db->select('id')->from($tbl_name)->where('book', $next_serial[0])->where('chapter', $next_serial[1])->where('verse', $next_serial[2])->limit(1);
        $query = $this->db->get();

        $id = 0;
        foreach ($query->result() as $row) {
            $id = $row->id;
        }

        $id -= 1;
        /* 改直接取得上一段的章節 */
        /* DB opreations */
        $this->db->select('book, chapter, verse')->from($tbl_name)->where('id', $id)->limit(1);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $next_serial[0] = $this->bible->book_abbr_by_id($row->book);
            $next_serial[1] = $row->chapter;
            $next_serial[2] = $row->verse;
            return $next_serial;
        }

        /* 沒有上一節（到最前面了） */
        return array();
    }

    function book_list($keyword, $language='english')
    {
        if (!isset($keyword)) return;

        $start = 1;
        $end = 66;

        if ($keyword === 'tanakh') {
            $end = 39;
        }

        if ($keyword === 'torah') {
            $end = 5;
        }

        $tbl_name = 'book_english';

        /* DB opreations */
        $this->db->select('id, name');
        $query = $this->db->get($tbl_name, $end, 0);

        $book_list = array();

        foreach ($query->result() as $row) {
            $book = array();
            $book['name'] = $row->name;
            $book['id'] = $row->id;
            $book['abbr'] = $this->book_abbr_by_id($row->id);

            $book_list[] = $book;
        }

        return $book_list;
    }

}