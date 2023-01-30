<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Вы должны принять :attribute.',
    'accepted_if' => 'Вы должны принять :attribute, если :other имеет значение :value.',
    'active_url' => 'Поле :attribute не является валидным URL.',
    'after' => 'Поле :attribute должно быть датой после :date.',
    'after_or_equal' => 'Поле :attribute должно быть датой после :date или равным ей.',
    'alpha' => 'Поле :attribute должно содержать только буквы.',
    'alpha_dash' => 'Поле :attribute должно содержать только буквы, цифры, дефисы или нижние подчеркивания.',
    'alpha_num' => 'Поле :attribute должно содержать только буквы и цифры.',
    'array' => 'Поле :attribute должно быть массивом.',
    'ascii' => 'Поле :attribute должно содержать только однобайтовые буквенно-цифровые символы.',
    'before' => 'Поле :attribute должно быть датой перед :date.',
    'before_or_equal' => 'Поле :attribute должно быть датой перед :date или равным ей.',
    'between' => [
        'array' => 'Поле :attribute должно содержать от :min до :max элементов.',
        'file' => 'Размер :attribute должен быть от :min до :max килобайт.',
        'numeric' => 'Значение :attribute должно быть между :min и :max.',
        'string' => 'Длина :attribute должна быть от :min до :max символов.',
    ],
    'boolean' => 'Поле :attribute должно иметь логическое значение true (истина) или false (ложь).',
    'confirmed' => 'Поле :attribute не совпадает с подтверждением.',
    'current_password' => 'Неверный пароль.',
    'date' => 'Поле :attribute не является корректной датой.',
    'date_equals' => 'Поле :attribute должно быть датой, равной :date.',
    'date_format' => 'Поле :attribute не соответствует формату :format.',
    'decimal' => 'Поле :attribute должно содержать :decimal десятичных разрядов.',
    'declined' => 'Поле :attribute должно быть отклонено.',
    'declined_if' => 'Поле :attribute должно быть отклонено, если :other имеет значение :value.',
    'different' => 'Поля :attribute и :other должны различаться.',
    'digits' => 'Поле :attribute должно содержать :digits цифр.',
    'digits_between' => 'Поле :attribute должно содержать от :min до :max цифр.',
    'dimensions' => 'Поле :attribute имеет недопустимые размеры изображения.',
    'distinct' => 'Поле :attribute имеет повторяющееся зачение.',
    'doesnt_end_with' => 'Поле :attribute не должно заканчиваться одним из указанных значений: :values.',
    'doesnt_start_with' => 'Поле :attribute не должно начинаться одним из указанных значений: :values.',
    'email' => 'Поле :attribute должно быть действительным электронным адресом.',
    'ends_with' => 'Поле :attribute должно заканчиваться одним из указанных значений: :values.',
    'enum' => 'Выбранное значение для поля :attribute некорректно.',
    'exists' => 'Выбранное значение для поля :attribute некорректно.',
    'file' => 'Поле :attribute должно быть файлом.',
    'filled' => 'Поле :attribute обязательно для заполнения.',
    'gt' => [
        'array' => 'Поле :attribute должно содержать больше :value элементов.',
        'file' => 'Размер :attribute должен быть больше :value килобайт.',
        'numeric' => 'Значение поля :attribute должно быть больше :value.',
        'string' => 'Длина поля :attribute должна быть больше :value символов.',
    ],
    'gte' => [
        'array' => 'Поле :attribute должно содержать :value элементов или больше.',
        'file' => 'Размер :attribute должен быть больше или равен :value килобайт.',
        'numeric' => 'Значение поля :attribute должно быть больше или равно :value.',
        'string' => 'Количество символов в поле :attribute должно быть больше или равно :value.',
    ],
    'image' => 'Поле :attribute должно быть изображением.',
    'in' => 'Выбранное значение для поля :attribute некорректно.',
    'in_array' => 'Поле :attribute не существует в :other.',
    'integer' => 'Поле :attribute должно быть целым числом.',
    'ip' => 'TПоле :attribute должно быть действительным IP-адресом.',
    'ipv4' => 'Поле :attribute должно быть действительным IPv4-адресом.',
    'ipv6' => 'Поле :attribute должно быть действительным IPv6-адресом.',
    'json' => 'Поле :attribute должно быть валидной JSON строкой.',
    'lowercase' => 'Поле :attribute должно быть в нижнем регистре.',
    'lt' => [
        'array' => 'Поле :attribute должно содержать меньше :value элементов.',
        'file' => 'Размер :attribute должен быть меньше :value килобайт.',
        'numeric' => 'Значение поля :attribute должно быть меньше :value.',
        'string' => 'Длина поля :attribute должна быть меньше :value символов.',
    ],
    'lte' => [
        'array' => 'Поле :attribute должно содержать :value элементов или меньше.',
        'file' => 'Размер :attribute должен быть меньше или равен :value килобайт.',
        'numeric' => 'Значение поля :attribute должно быть меньше или равно :value.',
        'string' => 'Количество символов в поле :attribute должно быть меньше или равно :value.',
    ],
    'mac_address' => 'Поле :attribute должно быть действительным MAC-адресом.',
    'max' => [
        'array' => 'Поле :attribute не должно содержать больше :max элементов.',
        'file' => 'Поле :attribute не должно быть больше :max килобайт.',
        'numeric' => 'Значение поля :attribute не должно быть больше :max.',
        'string' => 'Длина поля :attribute не должна быть больше :max символов.',
    ],
    'max_digits' => 'Поле :attribute не должно содержать больше :max цифр.',
    'mimes' => 'Поле :attribute должно быть файлом одного из типов: :values.',
    'mimetypes' => 'Поле :attribute должно быть файлом одного из типов: :values.',
    'min' => [
        'array' => 'Поле :attribute должно содержать не менее :min элементов.',
        'file' => 'Поле :attribute должно быть не менее :min килобайт.',
        'numeric' => 'Значение поля :attribute должно быть не менее :min.',
        'string' => 'Длина поля :attribute должна быть не меньше :min символов.',
    ],
    'min_digits' => 'Поле :attribute должно содержать не меньше :max цифр.',
    'multiple_of' => 'Значение поля :attribute должно быть кратно :value.',
    'not_in' => 'Выбранное значение для поля :attribute некорректно.',
    'not_regex' => 'Формат поля :attribute недопустимый.',
    'numeric' => 'Значение поля :attribute должно быть числом.',
    'password' => [
        'letters' => 'Поле :attribute должно содержать хотя бы одну букву.',
        'mixed' => 'Поле :attribute должно содержать хотя бы одну заглавную и одну строчную букву.',
        'numbers' => 'Поле :attribute должно содержать хотя бы одну букву.',
        'symbols' => 'Поле :attribute должно содержать хотя бы один символ.',
        'uncompromised' => 'Данный :attribute появился в утечке данных. Пожалуйста, выберите другой :attribute.',
    ],
    'present' => 'Поле :attribute должно присутствовать.',
    'prohibited' => 'Поле :attribute запрещено.',
    'prohibited_if' => 'Поле :attribute запрещено когда :other имеет значение :value.',
    'prohibited_unless' => 'Поле :attribute запрещено, когда :other не равно :values.',
    'prohibits' => 'Поле :attribute запрещает присутствие :other.',
    'regex' => 'Формат поля :attribute недопустимый.',
    'required' => 'Поле :attribute обязательно для заполнения.',
    'required_array_keys' => 'Поле :attribute должно содержать вхождения для: :values.',
    'required_if' => 'Поле :attribute обязательно для заполнения, когда :other имеет значение :value.',
    'required_if_accepted' => 'Поле :attribute обязательно, когда принимается :other.',
    'required_unless' => 'Поле :attribute является обязательным, когда :other не равно :values.',
    'required_with' => 'Поле :attribute обязательно для заполнения, когда :values указано.',
    'required_with_all' => 'Поле :attribute обязательно для заполнения, когда :values указаны.',
    'required_without' => 'Поле :attribute обязательно для заполнения, когда :values не указано.',
    'required_without_all' => 'Поле :attribute обязательно для заполнения, когда :values не указаны.',
    'same' => 'Значение :attribute должно совпадать с :other.',
    'size' => [
        'array' => 'Количество элементов в поле :attribute должно быть :size.',
        'file' => 'Поле :attribute должно быть :size килобайт.',
        'numeric' => 'Значение поля :attribute должно быть :size.',
        'string' => 'Длина поля :attribute должна быть :size символов.',
    ],
    'starts_with' => 'Поле :attribute должно начинаться одним из указанных значений: :values.',
    'string' => 'Поле :attribute должно быть строкой.',
    'timezone' => 'Поле :attribute должнобыть валидной временной зоной.',
    'unique' => 'Такое значение поля :attribute уже занято.',
    'uploaded' => 'Не удалось загрузить :attribute.',
    'uppercase' => 'Поле :attribute должно быть в верхнем регистре..',
    'url' => 'Поле :attribute не является валидным URL.',
    'ulid' => 'Поле :attribute должно быть валидным ULID.',
    'uuid' => 'Поле :attribute должно быть валидным UUID.',

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
        'name' => [
            'unique' => ':attribute c таким именем уже существует.',
            'required' => 'Это обязательное поле.'
        ],
        'status_id' => [
            'required' => 'Это обязательное поле.'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
