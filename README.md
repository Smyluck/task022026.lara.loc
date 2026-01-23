<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Instalation

```bash
composer install

./vendor/bin/sail up -d

alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'

sail artisan migrate

sail artisan db:seed --class=CategorySeeder

sail artisan db:seed --class=ProductSeeder
```

## Developer

Maria Smyluck

## VSCode Variant1

Отличный вопрос! Настроить Visual Studio Code для комфортной работы со стеком Laravel + Inertia + Vue 3 — это ключ к высокой продуктивности. Нужно "подружить" VS Code с особенностями каждой из этих технологий.

Вот полный гайд по настройке, который даст вам "бесшовный" опыт разработки: подсветку синтаксиса, автодополнение, переход к определениям и многое другое.

### Шаг 1: Основные расширения (Must-Have)

Это база, без которой работать будет неудобно.

1.  **Vue - Official** (ID: `Vue.volar`)
    - **Зачем нужно:** Это **главное** расширение для Vue 3. Оно заменило старый Vetur. Обеспечивает идеальную подсветку синтаксиса для файлов `.vue`, понимает синтаксис `<script setup>`, проверяет типы в шаблонах и дает мощное автодополнение.
    - **Важно:** Если у вас установлен Vetur, **отключите или удалите его**, чтобы избежать конфликтов.

2.  **PHP Intelephense** (ID: `bmewburn.vscode-intelephense-client`)
    - **Зачем нужно:** Лучшее расширение для разработки на PHP в VS Code. Дает умное автодополнение для классов, методов, фасадов Laravel, переход к определению, поиск ссылок и многое другое.

3.  **Laravel Blade Snippets** (ID: `onecentlin.laravel-blade`)
    - **Зачем нужно:** Добавляет подсветку и автодополнение для директив Blade (например, `@inertia`, `@vite`). Хоть в Inertia-проекте вы будете меньше использовать Blade, это расширение все равно необходимо для главного файла `app.blade.php`.

4.  **Tailwind CSS IntelliSense** (ID: `bradlc.vscode-tailwindcss`)
    - **Зачем нужно:** Laravel Breeze по умолчанию использует Tailwind CSS. Это расширение — просто магия. Оно дает:
        - Автодополнение для классов Tailwind.
        - Подсказки при наведении на класс (показывает, какие CSS-свойства он применяет).
        - Линтинг и сортировку классов.

### Шаг 2: Расширения для "магии" Laravel + Inertia

Эти расширения связывают бэкенд и фронтенд, делая разработку невероятно удобной.

5.  **Laravel Inertia** (ID: `proton-nl.laravel-inertia`)
    - **Зачем нужно:** Это **супер-важное** расширение для вашего стека! Оно анализирует ваш PHP-код и понимает, какие данные (`props`) вы передаете из контроллера в Vue-компонент через `Inertia::render()`.
        - **Автодополнение пропсов:** Внутри `<script setup>` вы начнете писать `defineProps({ ... })` и получите автодополнение имен пропсов!
        - **Переход к определению:** Кликнув на имя компонента в `Inertia::render('Products/Index')`, вы перейдете прямо в файл `Products/Index.vue`.

6.  **Laravel Extra Intellisense** (ID: `amiralizadeh9480.laravel-extra-intellisense`)
    - **Зачем нужно:** Отличное дополнение к Intelephense. Дает автодополнение для:
        - Имен маршрутов в функции `route()`.
        - Имен представлений (`view()`), конфигов (`config()`) и т.д.
        - Это очень полезно в Vue-компонентах, когда вы используете Ziggy (который Breeze устанавливает по умолчанию) для вызова `route('products.show', product.id)`.

### Шаг 3: Расширения для качества кода (Quality of Life)

Эти расширения не обязательны, но сильно улучшают читаемость кода и помогают поддерживать порядок.

7.  **ESLint** (ID: `dbaeumer.vscode-eslint`)
    - **Зачем нужно:** Анализирует ваш JavaScript/Vue код и подсвечивает ошибки или стилистические несоответствия прямо в редакторе.

8.  **Prettier - Code formatter** (ID: `esbenp.prettier-vscode`)
    - **Зачем нужно:** Автоматически форматирует ваш код (JS, Vue, CSS, JSON) при сохранении. Помогает поддерживать единый стиль кода во всем проекте без усилий.

9.  **DotENV** (ID: `mikestead.dotenv`)
    - **Зачем нужно:** Простая подсветка синтаксиса для `.env` файлов.

### Шаг 4: Настройка VS Code (`settings.json`)

Просто установить расширения недостаточно. Их нужно правильно настроить, чтобы они не конфликтовали и работали автоматически.

1.  Откройте настройки VS Code: `Ctrl + Shift + P` (или `Cmd + Shift + P` на Mac) и введите `> Preferences: Open User Settings (JSON)`.
2.  Добавьте или измените эти параметры в вашем `settings.json`:

```json
{
    // Включаем форматирование при сохранении файла
    "editor.formatOnSave": true,

    // Указываем Prettier как форматер по умолчанию для JS и Vue
    // Это предотвратит конфликты с другими форматерами.
    "editor.defaultFormatter": "esbenp.prettier-vscode",
    "[vue]": {
        "editor.defaultFormatter": "esbenp.prettier-vscode"
    },
    "[javascript]": {
        "editor.defaultFormatter": "esbenp.prettier-vscode"
    },
    // Для PHP используем Intelephense
    "[php]": {
        "editor.defaultFormatter": "bmewburn.vscode-intelephense-client"
    },

    // Настройки для ESLint
    "eslint.validate": ["javascript", "javascriptreact", "vue"],

    // Настройки для Tailwind CSS IntelliSense (важно для @apply в <style lang="postcss">)
    "files.associations": {
        "*.css": "tailwindcss"
    },
    "editor.quickSuggestions": {
        "strings": "on"
    }
}
```

### Шаг 5: Настройка путей для автодополнения (`jsconfig.json`)

Это **критически важный** шаг, чтобы VS Code понимал импорты вида `@/Components/MyComponent.vue`.

1.  В корне вашего Laravel-проекта создайте файл с именем `jsconfig.json`.
2.  Вставьте в него следующий код:

    ```json
    {
        "compilerOptions": {
            "baseUrl": ".",
            "paths": {
                "@/*": ["resources/js/*"]
            }
        },
        "exclude": ["node_modules", "public"]
    }
    ```

    Этот файл говорит VS Code, что псевдоним `@` ссылается на папку `resources/js`. Теперь у вас будет работать автодополнение импортов и переход к файлу по `Ctrl/Cmd + Click` на пути.

После выполнения всех этих шагов и перезагрузки VS Code ваш редактор будет полностью готов к комфортной и быстрой разработке на стеке Laravel 12 + Vue 3 + Inertia.js.

## VSCODE Variant2

# 🎨 Настройка VS Code для Laravel 12 + Vue 3 + Inertia.js

Мы настроим полную подсветку синтаксиса, автодополнение, форматирование кода и исправим все возможные конфликты между инструментами. Все настройки оптимизированы под современный стек Laravel 12.

---

## 📦 Шаг 1: Установите необходимые расширения

Сначала установите все обязательные расширения из маркетаплейса VS Code. Отключите старое расширение **Vetur**, оно не поддерживается для Vue 3 и будет конфликтовать с новыми инструментами.

### ✅ Обязательные расширения

| Расширение                                                                                                                    | Что делает                                                                                                                                     |
| ----------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------- |
| [Vue Language Features (Volar)](https://marketplace.visualstudio.com/items?itemName=Vue.volar)                                | Официальное расширение от команды Vue для подсветки синтаксиса, автодополнения и проверки типов в Vue 3. Заменяет устаревший Vetur.            |
| [Inertia.js](https://marketplace.visualstudio.com/items?itemName=reinink.inertia-vscode)                                      | Официальное расширение от создателя Inertia. Добавляет автодополнение для `usePage()`, `router.visit()`, `Inertia::render()` и прочих функций. |
| [Intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client)                       | Лучшее расширение для автодополнения, подсветки и анализа PHP-кода в Laravel.                                                                  |
| [Laravel Extra Intellisense](https://marketplace.visualstudio.com/items?itemName=amiralizadeh9480.laravel-extra-intellisense) | Дополняет Intelephense: добавляет автодополнение маршрутов, конфигов, переменных окружения, моделей Laravel.                                   |
| [Laravel Blade Snippets](https://marketplace.visualstudio.com/items?itemName=onecentlin.laravel-blade)                        | Подсветка синтаксиса и сниппеты для Blade-шаблонов.                                                                                            |
| [Tailwind CSS IntelliSense](https://marketplace.visualstudio.com/items?itemName=bradlc.vscode-tailwindcss)                    | Автодополнение классов Tailwind CSS (используется по умолчанию в стартовых наборах Inertia).                                                   |
| [Laravel Pint](https://marketplace.visualstudio.com/items?itemName=open-southeners.laravel-pint)                              | Форматирование PHP-кода по стандартам Laravel с помощью официального утилиты Pint.                                                             |
| [Prettier](https://marketplace.visualstudio.com/items?itemName=esbenp.prettier-vscode)                                        | Универсальный форматтер для Vue, JavaScript, TypeScript.                                                                                       |

---

## 🚀 Шаг 2: Включите Take Over Mode (обязательно для Vue 3)

По умолчанию VS Code использует собственный сервер TypeScript для обработки JS/файлов, что создает конфликты с Volar и ломает подсветку в Vue компонентах.

**Take Over Mode** заставляет Volar обрабатывать все файлы `.vue`, `.js`, `.jsx`, `.ts`, `.tsx` полностью, что решает все проблемы с подсветкой и автодополнением.

### Как включить:

1. Откройте палитру команд `Ctrl+Shift+P` или `Cmd+Shift+P`
2. Найдите и выберите: `Extensions: Show Built-in Extensions`
3. В поиске введите `TypeScript and JavaScript Language Features`
4. Нажмите кнопку `Disable (Workspace)`
5. Перезапустите VS Code

> 💡 При необходимости вы всегда сможете включить обратно встроенный сервер TypeScript.

---

## ⚙️ Шаг 3: Конфигурация настроек VS Code

Откройте файл настроек (`Ctrl+,` или `Cmd+,` → нажмите на иконку "Открыть settings.json") и вставьте готовую конфигурацию:

```json
{
    // 🟢 Общие настройки
    "files.autoSave": "onFocusChange",
    "editor.formatOnSave": true,
    "editor.codeActionsOnSave": {
        "source.fixAll": "explicit"
    },

    // 🟢 Настройки для Vue 3 и Volar
    "vue.volar.takeOverMode": true,
    "files.associations": {
        "*.vue": "vue"
    },
    "emmet.includeLanguages": {
        "vue-html": "html",
        "vue": "html"
    },

    // 🟢 Настройки для PHP и Laravel
    "intelephense.environment.documentRoot": "\({workspaceFolder}",
    "intelephense.environment.phpVersion": "8.3", // Укажите вашу версию PHP
    "laravel-pint.enable": true,
    "laravel-pint.formatOnSave": true,
    "[php]": {
        "editor.defaultFormatter": "open-southeners.laravel-pint"
    },

    // 🟢 Настройки для Blade
    "[blade]": {
        "editor.defaultFormatter": "shufo.vscode-blade-formatter"
    },
    "files.associations": {
        "*.blade.php": "blade"
    },

    // 🟢 Настройки для форматирования Vue/JS
    "[vue]": {
        "editor.defaultFormatter": "esbenp.prettier-vscode"
    },
    "[javascript]": {
        "editor.defaultFormatter": "esbenp.prettier-vscode"
    },
    "[typescript]": {
        "editor.defaultFormatter": "esbenp.prettier-vscode"
    },

    // 🟢 Исключаем лишние папки из индексации
    "files.exclude": {
        "**/node_modules": true,
        "**/vendor": true,
        "**/.git": true,
        "**/storage": true
    }
}
```

---

## 🧙 Шаг 4: Настройка автодополнения для Inertia и Ziggy

### ✅ Автодополнение маршрутов Ziggy в Vue компонентах

В Inertia мы часто используем функцию `route()` для генерации ссылок. Чтобы настроить её автодополнение:

1. Убедитесь, что у вас установлен пакет `ziggy-js` (он есть в стартовых наборах Breeze/Inertia)
2. Добавьте в корень проекта файл `ziggy.d.ts` (он будет генерироваться автоматически, либо создайте вручную):

```typescript
import { RouterProps } from "ziggy-js";

declare global {
    var route: (
        name: string,
        params?: any,
        absolute?: boolean,
        config?: RouterProps,
    ) => string;
}

export {};
```

3. Теперь при вводе `route('` в Vue компоненте вы увидите автодополнение всех имен маршрутов Laravel.

### ✅ Автодополнение пропсов из Laravel

Официальное расширение Inertia.js автоматически анализирует ваш код Laravel и показывает автодополнение для данных, переданных через `Inertia::render()`, при вызове `usePage().props` в Vue.

Например, если вы передали из контроллера:

```php
return Inertia::render('Products/Index', [
    'products' => \)products,
    'categories' => $categories,
]);
```

То в Vue при вводе `usePage().props.` вы увидите автодополнение `products` и `categories`.

---

## 🎨 Шаг 5: Дополнительные улучшения

### ✅ Сниппеты для быстрого создания компонентов

Вы можете создать собственные сниппеты для быстрого с$оздания Inertia-страниц или Vue-компонентов:

1. Откройте `Файл → Предпочтения → Пользовательские сниппеты`
2. Выберите `vue.json`
3. Добавьте сниппет для быстрого создания базового компонента:

```json
{
    "Inertia Page": {
        "prefix": "inertia-page",
        "body": [
            "<script setup>",
            "import { usePage } from '@inertiajs/vue3'",
            "import { Link } from '@inertiajs/vue3'",
            "",
            "const props = defineProps({",
            "  // Пропсы из Laravel",
            "})",
            "",
            "const page = usePage()",
            "</script>",
            "",
            "<template>",
            "  <div class=\"container mx-auto px-4 py-8\">",
            "    $0",
            "  </div>",
            "</template>",
            ""
        ],
        "description": "Базовая структура страницы Inertia"
    }
}
```

### ✅ Индикатор прогресса Inertia

В стартовых наборах Breeze/Inertia уже настроен индикатор загрузки, но если его нет, установите пакет:

```bash
npm install @inertiajs/progress
```

---

## 🐛 Исправление распространенных проблем

| Проблема                                    | Решение                                                                                                          |
| ------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- |
| Не подсвечивается синтаксис в `.vue` файлах | Убедитесь, что вы отключили Vetur и включили Take Over Mode. Перезапустите VS Code.                              |
| Нет автодополнения для `route()` в Vue      | Установите расширение Laravel Extra Intellisense и убедитесь, что пакет `ziggy-js` установлен.                   |
| VS Code не видит классы Laravel             | Установите Intelephense и добавьте папку `vendor` в исключения индексации (уже настроено в нашем settings.json). |
| Не работает форматирование на сохранении    | Убедитесь, что вы выбрали правильный форматтер для каждого типа файлов (как указано в конфигурации).             |

---

## ✅ Проверка настроек

Чтобы убедиться, что все работает корректно:

1. Откройте любой существующий `.vue` файл из папки `resources/js/Pages`
2. Начните вводить `usePage().props.` — должны появиться автодополнение данных из Laravel
3. Начните вводить `route('` — должны появиться все ваши маршруты Laravel
4. Наберите любой код Vue, убедитесь, что синтаксис подсвечен корректно
5. Сохраните файл — код должен отформатироваться автоматически
