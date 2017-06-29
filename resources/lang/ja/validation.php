<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted'             => ':attributeを承認してください。',
    'active_url'           => ':attributeは、有効な URL ではありません。',
    'after'                => ':attributeには、:date 以降の日付を指定してください。',
    'alpha'                => ':attributeには、アルファベッドのみ使用できます。',
    'alpha_dash'           => ":attributeには、英数字 ('A-Z','a-z','0-9') とハイフンと下線 ('-','_') が使用できます。",
    'alpha_num'            => ":attributeには、英数字('A-Z','a-z','0-9')が使用できます。",
    'array'                => ':attributeには、配列を指定してください。',
    'before'               => ':attributeには、:date 以前の日付を指定してください。',
    'between'              => [
        'numeric' => ':attribute には、:min から、:max までの数字を指定してください。',
        'file'    => ':attribute には、:min KBから:max KB までのサイズのファイルを指定してください。',
        'string'  => ':attribute は、:min 文字から :max 文字にしてください。',
        'array'   => ':attribute の項目は、:min 個から :max 個にしてください。',
    ],
    'boolean'              => ":attribute には、'true' か 'false' を指定してください。",
    'confirmed'            => ':attribute と :attribute 確認が一致しません。',
    'date'                 => ':attribute は、正しい日付ではありません。',
    'date_format'          => ":attribute の形式は、':format' と合いません。",
    'different'            => ':attribute と :other には、異なるものを指定してください。',
    'digits'               => ':attribute は、:digits 桁にしてください。',
    'digits_between'       => ':attribute は、:min 桁から :max 桁にしてください。',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => ':attribute は、有効なメールアドレス形式で指定してください。',
    'exists'               => '選択された :attribute は、有効ではありません。',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => ':attribute は必須です。',
    'image'                => ':attribute には、画像を指定してください。',
    'in'                   => '選択された :attribute は、有効ではありません。',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => ':attribute には、整数を指定してください。',
    'ip'                   => ':attribute には、有効な IP アドレスを指定してください。',
    'json'                 => ':attribute には、有効な JSON 文字列を指定してください。',
    'max'                  => [
        'numeric' => ':attribute には、:max 以下の数字を指定してください。',
        'file'    => ':attribute には、:max KB 以下のファイルを指定してください。',
        'string'  => ':attribute は、:max 文字以下にしてください。',
        'array'   => ':attribute の項目は、:max 個以下にしてください。',
    ],
    'mimes'                => ':attribute には、:values タイプのファイルを指定してください。',
    'min'                  => [
        'numeric' => ':attribute には、:min 以上の数字を指定してください。',
        'file'    => ':attribute には、:min KB 以上のファイルを指定してください。',
        'string'  => ':attribute は、:min 文字以上にしてください。',
        'array'   => ':attribute の項目は、:max 個以上にしてください。',
    ],
    'not_in'               => '選択された :attribute は、有効ではありません。',
    'numeric'              => ':attribute には、数字を指定してください。',
    'present'              => 'The :attribute field must be present.',
    'regex'                => ':attribute には、有効な正規表現を指定してください。',
    'required'             => ':attribute は、必ず指定してください。',
    'required_if'          => ':other が :value の場合、:attribute を指定してください。',
    'required_unless'      => ':other が :value 以外の場合、:attribute を指定してください。',
    'required_with'        => ':values が指定されている場合、:attribute も指定してください。',
    'required_with_all'    => ':values が全て指定されている場合、:attribute も指定してください。',
    'required_without'     => ':values が指定されていない場合、:attribute を指定してください。',
    'required_without_all' => ':values が全て指定されていない場合、:attribute を指定してください。',
    'same'                 => ':attribute と :other が一致しません。',
    'size'                 => [
        'numeric' => ':attribute には、:size を指定してください。',
        'file'    => ':attribute には、:size KB のファイルを指定してください。',
        'string'  => ':attribute は、:size 文字にしてください。',
        'array'   => ':attribute の項目は、:size 個にしてください。',
    ],
    'string'               => ':attribute には、文字を指定してください。',
    'timezone'             => ':attribute には、有効なタイムゾーンを指定してください。',
    'unique'               => '指定の :attribute は既に使用されています。',
    'url'                  => ':attribute は、有効な URL 形式で指定してください。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name'                  => '名前',
        'username'              => 'ユーザ名',
        'email'                 => 'メールアドレス',
        'password'              => 'パスワード',
        'password_confirmation' => 'パスワード確認',
        'title'                 => 'タイトル',
        'content'               => '内容',
        'date'                  => '日付',
        'time'                  => '時間',
        'nickname'              => 'ニックネーム',
        'body'                  => '内容',
        'start_at'              => '開始日',
        'end_at'                => '終了日',
        'image'                 => '画像',
        'type_name'             => '名称',
        'new-password'          => '新しいパスワード',
        'project-pass'          => 'プロジェクトパスワード',
    ],

];
