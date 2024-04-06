<?php

namespace App\Rules;

use App\Models\Author;
use App\Models\SourceArticle;
use App\Models\YoutubeLink;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ArticleAttachesRule implements ValidationRule
{
    public function __construct(protected $category)
    {
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $requiredTypes = [];
        $types = array_keys($value);

        if($this->category['hasSource']) {
            $requiredTypes[] = 'source';
        }

        if($this->category['hasYoutubeLink']) {
            $requiredTypes[] = 'youtubeLink';
        }

        foreach ($requiredTypes as $type) {
            if(!in_array($type, $types)) {
                $fail('the :attribute field is required');
            }
        }


    }

}
