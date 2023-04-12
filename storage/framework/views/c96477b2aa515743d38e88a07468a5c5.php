<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.master','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layouts.master'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> 
        מסמכים MY-SAFE
     <?php $__env->endSlot(); ?>

     <?php $__env->slot('body', null, []); ?> 

        <nav class="" style="direction: rtl;">
            <div class="mx-auto lg:max-w-2xl sm:w-full pt-4 sm:pr-1">
                <div class="relative flex h-16 items-center justify-between">
                    <div class="flex flex- items-center justify-center sm:items-center">
                        <div class="flex flex-shrink-0 items-start sm:items-center">
                            <img class="block h-16 w-auto sm:align-middle"
                                 src="<?php echo e(\Illuminate\Support\Facades\Storage::url('/') .  $data['user']->logo_url); ?>"
                                 alt="Your Company">
                        </div>
                        <div class=" sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="<?php echo e(url('/')); ?>" class=" text-black font-bold text-2xl rounded-md px-3 py-2"
                                   aria-current="page">MY-SAFE - מערכת לשליחת הצעות מחיר וחתימה דיגיטאלית</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <br>
        <div class="">
            <div class="mx-auto max-w-7xl px-6 pt-5 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <h2 class="text-base font-semibold leading-7 text-indigo-600">הצעת מחיר / חוזה לחתימה</h2>
                    <p style="direction: rtl"
                       class="mt-2 md:text-2xl sm:text-1xl font-bold tracking-tight text-gray-900 "> מסמך זה
                        נוצר על ידי
                        מערכת MY-SAFE לשליחת הצעות מחיר וחתימה דיגיטאלית</p>
                    <p class="mt-6 text-lg leading-8 text-gray-600">עיין בפרטי הצעת המחיר / חוזה ובמידה ונדרשת חתימה
                        -
                        תוכל לעשות זאת בתחתית המסמך </p>
                </div>
            </div>
        </div>

        <div class="mx-auto md:max-w-7xl sm:px-0  lg:px-6 lg:px-8" style="direction: rtl;">
            <div class="mx-auto max-w-2xl lg:text-right p-2"
                 style="background-color: rgba(44,180,243,0.3); border: 1px solid gray">
                <div><strong>מספר <?php echo e($data['contract']->type === 1 ? 'הצעת מחיר' : 'חוזה'); ?>

                        - <?php echo e($data['contract']->id); ?></strong></div>
                <div class="mt-6 text-lg flex justify-between leading-8 text-gray-600">
                    <span><?php echo e('לכבוד: ' . $data['customer']-> fullName); ?></span>

                    <span><?php echo e(date('d/m/Y')); ?></span>
                </div>
                <table class="table-auto border-collapse border border-slate-600 text-center w-full">
                    <thead class="text-white text-center bg-black">
                    <tr>
                        <th>פירוט</th>
                        <th>מחיר ליחידה</th>
                        <th>כמות</th>
                        <th>סה"כ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $data['contract']->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-right pr-2 border border-slate-600"><?php echo e($item['name']); ?></td>
                            <td class="border border-slate-600"><?php echo e($item['price']); ?></td>
                            <td class="border border-slate-600"><?php echo e($item['count']); ?></td>
                            <td class="border border-slate-600"><?php echo e($item['price'] * $item['count']); ?> ₪</td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-left pl-1">סה"כ <?php echo e($data['contract']->getTotalPriceAttribute()); ?> ₪</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-left pl-1 font-bold">סה"כ לתשלום <span
                                class='pr-1 pl-1 bg-black/50 text-white text-2xl'><?php echo e($data['contract']->getTotalPriceAttribute()); ?> ₪ </span>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="mx-auto max-w-7xl pr-1">
                    <div class="mx-auto max-w-2xl ">
                        <h2 class="text-right font-semibold text-black-600">הערות נוספות</h2>
                        <?php echo $data['contract']->contracts_content; ?>

                    </div>
                </div>
                <br>
                <div class="columns-2 flex items-end justify-start">
                    <div class="w-full text-right">
                        <div>
                            <strong>מאשר <?php echo e($data['contract']->type === 1 ? 'הצעת המחיר' : 'חוזה'); ?>:</strong>
                            <?php echo e($data['user']-> name); ?>

                        </div>
                        <div style="display: flex; justify-content: right; align-items: end">
                            <strong>חתימה : </strong>
                            <img class="border-b border-b-2 border-black" style="height: 50px;"
                                 src="<?php echo e($data['user']-> signature); ?>" alt="">
                        </div>
                    </div>
                    <div class="w-full text-left">
                        <div>
                            <strong>חתימת לקוח:</strong>
                            <?php echo e($data['customer']-> fullName); ?>

                        </div>
                        <div style="display: flex; justify-content: left; align-items: end">
                            <strong>חתימה : </strong>
                            <?php if($data['contract']-> signed_url !== null && $data['contract']-> signed_url !== ''): ?>
                                <img class="border-b border-b-2 border-black" style="height: 50px; background-color: rgba(0,254,255,0)"
                                     src="<?php echo e(\Illuminate\Support\Facades\Storage::url('/'). 'signatures/' .$data['contract']-> signed_url); ?>" alt="">
                            <?php else: ?>
                                <div class="border-b border-b-2 border-black text-center" id="no-signed">
                                    עדיין לא נחתם
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>


            

            <?php if($data['contract']->type === 2 && $data['contract']->signed === 0): ?>
                <div class="text-center text-2xl" id="after"></div>
                <div x-data="{ modelOpen: false }" id="before">
                    <button @click="modelOpen =!modelOpen"
                            class="mt-2 mr-auto ml-auto mb-2 flex items-center justify-center px-3 py-2 space-x-2 text-2xl tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                        </svg>
                        <span>&nbsp; לחתימה דיגיטלית</span>
                    </button>

                    <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
                         role="dialog" aria-modal="true">
                        <div
                            class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                            <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                                 x-transition:enter="transition ease-out duration-300 transform"
                                 x-transition:enter-start="opacity-0"
                                 x-transition:enter-end="opacity-100"
                                 x-transition:leave="transition ease-in duration-200 transform"
                                 x-transition:leave-start="opacity-100"
                                 x-transition:leave-end="opacity-0"
                                 class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
                            ></div>

                            <div x-cloak x-show="modelOpen"
                                 x-transition:enter="transition ease-out duration-300 transform"
                                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                 x-transition:leave="transition ease-in duration-200 transform"
                                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                 class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
                            >
                                <div class="flex items-center justify-between space-x-4">
                                    <button @click="modelOpen = false"
                                            class="text-gray-600 focus:outline-none hover:text-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </button>
                                </div>

                                <p class="mt-2 text-center text-gray-500 ">
                                    נא לחתום במרכז המשטח
                                </p>

                                <form @submit.prevent="()=>{send_signature()}" class="mt-5">
                                    <div>
                                        <canvas class="mr-auto ml-auto bg-white border-2" id="signature"
                                                name="signature"></canvas>
                                    </div>

                                    <div class="mt-4">


                                        <div class="flex justify-center mt-6">
                                            <button type="submit"
                                                    class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                                                שלח חתימה
                                            </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="mx-auto max-w-2xl text-right rtl bg-gray-400/100 p-1">
            <p class="mt-2 text-white text-center tracking-tight" style="direction: rtl;">
                בכל מקרה של שאלה או בעיה אפשר לפנות למייל <a style="color: #0d83dd;"
                    href=<?php echo e('mailto:' . $data['user']->comp_email); ?>><?php echo e(' - ' . $data['user']->comp_email); ?></a>
            </p>
            <div class="flex justify-center space-x-4 pt-2 text-right">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a style="direction: rtl" href="<?php echo e(url('/')); ?>" class="tracking-tight"
                   aria-current="page">כל הזכויות שמורות ל- MY-SAFE - מערכת לשליחת הצעות מחיר וחתימה דיגיטאלית</a>
            </div>
        </div>

        <style>
            @media (max-width: 750px) {
                body {

                }
            }

            body {
                --tw-bg-opacity: 1;
                background-color: rgb(243 244 246 / var(--tw-bg-opacity));
            }

            ol {
                list-style: decimal;
                padding-right: 1.2rem;
            }

            ul {
                list-style: disc;
                padding-right: 1.2rem;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>

        <script>

            const canvas = document.querySelector("#signature");
            const signaturePad = new SignaturePad(canvas, {
                minWidth: 1,
                maxWidth: 2,
                penColor: "rgb(0,0,0)",
            });

            function send_signature() {
                let image = signaturePad.toDataURL();
                axios.post('<?php echo e(route('contract.update', ['contract' => $data['contract']->id])); ?>', {
                    data: image
                }).then(function (response) {
                    document.getElementById('before').textContent = 'החתימה נשלחה בהצלחה';
                    document.getElementById('before').style.textAlign = 'center';
                    document.getElementById('before').style.fontSize = '1.5rem';
                    document.location.reload();
                })
                    .catch(function (response) {
                        console.log(response);
                    })
            }
        </script>

     <?php $__env->endSlot(); ?>


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/contracts/resources/views/contract/show.blade.php ENDPATH**/ ?>