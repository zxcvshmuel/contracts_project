<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.welcome','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layouts.welcome'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <form wire:submit.prevent="submit" class="form">
        <div class="mb-6 mt-1">
            <input type="text" id="name" placeholder="שם פרטי:"
                   class="input">
        </div>

        <div class="mb-6">
            <input type="text" id="email" placeholder='דוא"ל:'
                   class="input">
        </div>


        <div class="mb-6">
            <input type="text" id="small-input" placeholder="טלפון:"
                   class="input">
        </div>
        <div class="">
            <button type="submit"
                    class="button">
                לשליחה
            </button>
        </div>
    </form>

    <style>
        .background-img{
            z-index: -1;
        }

        .background-img.mobile{
            display: none;
        }

        .background-img.desktop{
            display: block;
        }

        .form-container {
            height: 95vh;
            width: 34vw;
            margin-left: 2vw;
            margin-top: 2.5vh;
            background-size: 100% 100%;
            background-image: url(<?php echo e(\Illuminate\Support\Facades\Storage::url('/') . 'layout/desktop/Rectangle2.png'); ?>);
            background-repeat: no-repeat;
        }

        .logo {
            height: 15vi;
            margin-top: 2vi;
        }

        h2 {
            direction: rtl;
            font-weight: bold;
            color: #8447FF;
            font-size: 1.8vi;
            line-height: 100px;
        }

        .input {
            direction: rtl;
            height: 3vi;
            width: 20vi;
            border-radius: 20px;
            box-shadow: 0px 11px 9px 0px #888888a8;
            border: 1px solid #ccc;
            padding: 0.5em;
            font-size: 1rem;
            background-color: #F3F4F6;
        }

        .form-container form {
            min-height: 40%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .button {
            width: 100%;
            max-width: 10vi;
            height: 3vi;
            background-color: #8447FF;
            color: #fff;
            border: none;
            border-radius: 20px;
            box-shadow: 0px 11px 9px 0px #888888a8;
            cursor: pointer;
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: bold;
            font-size: larger;
        }

        .button:hover {
            background-color: #8447FF;
        }

        .button:hover {
            background-color: #8447FF;
        }

        .button:focus {
            outline: none;
            box-shadow: 0px 0px 0px 3px rgba(0, 123, 255, 0.4);
        }

        /* Media queries for mobile */
        @media screen and (max-width: 768px) {
            .background-img.desktop{
                z-index: -1;
                display: none;
            }

            .background-img.mobile{
                display: block;
            }

            h2 {
                display: none;
            }


            .form-container {
                height: auto;
                width: 100%;
                margin-left: 0;
                margin-top: 0;
                background-size: cover;
                background-position: center;
                padding: 2rem;
                background-image: none;
            }



            .logo {
                height: 7vw;
                margin-top: 1vw;
                margin-bottom: 1vw;
                display: none;
            }

            h2 {
                font-size: 1rem;
                margin-top: 1vw;
                margin-bottom: 2vw;
            }

            .input {
                height: 2.5rem;
                width: 100%;
                border-radius: 10px;
            }

            .button {
                width: 65%;
                max-width: none;
                height: 2.2rem;
                font-size: 0.9rem;
                border-radius: 10px;
            }

            .base-form{
                position: absolute;
                bottom: 0;
            }

            form{
                padding-left: 3rem;
                padding-right: 3rem;
                padding-bottom: 2rem;

            }

            .mb-6{
                margin-bottom: calc(1.5rem / 2);
            }
        }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/contracts/resources/views/livewire/welcome.blade.php ENDPATH**/ ?>