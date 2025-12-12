<?php

namespace App\Livewire\Language;

use Livewire\Component;

class LanguageSelector extends Component
{
    public $currentLocale;
    public $locales = [
        'en' => 'EN',
        'ru' => 'RU',
        'ee' => 'EE',
        'ro' => 'RO',
    ];

    public function mount()
    {
        $this->currentLocale = app()->getLocale();
    }

    public function setLanguage($locale)
    {
        if (array_key_exists($locale, $this->locales)) {
            // Сохраняем локаль в сессии
            session(['locale' => $locale]);
            
            $this->currentLocale = $locale;
            
            // Отправляем событие для JavaScript, чтобы перезагрузить страницу
            $this->dispatch('language-changed');
        }
    }

    public function render()
    {
        return view('livewire.language.language-selector');
    }
}