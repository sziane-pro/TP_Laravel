<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ContractModels extends Model
{
    protected $fillable = [
        'name',
        'content',
        'user_id'
    ];

    protected $casts = [
        'content' => 'array',
    ];
    
    public function generateContractContent(array $tenantData)
    {
       
        $data = is_string($this->content) ? json_decode($this->content, true) : $this->content;

        if (!isset($data['blocks']) || !is_array($data['blocks'])) {
            return json_encode($data);
        }

        foreach ($data['blocks'] as &$block) {
            if (isset($block['data']['text'])) {
                foreach ($tenantData as $key => $value) {
                    $placeholder = '{' . $key . '}';
                    $block['data']['text'] = str_replace($placeholder, $value, $block['data']['text']);
                }
            }
        }

        return json_encode($data);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
