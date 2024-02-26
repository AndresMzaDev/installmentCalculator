<script setup>
const result = defineProps(["result", "dataForm"]);
const emit = defineEmits(["goBack"]);

function goBack() {
  console.log("regresar");
  emit("goBack");
}
</script>

<template>
  <div
    class="mx-auto mt-16 max-w-2xl rounded-3xl ring-1 ring-gray-200 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none"
  >
    <div class="p-8 sm:p-10 lg:flex-auto">
      <h3 class="text-2xl font-bold tracking-tight text-gray-900">
        Resultados
      </h3>
      <p class="mt-6 text-base leading-7 text-gray-600">
        Esta cuota esta basada en los datos ingresados, si quieres cambiar los datos solo tienes que realizar otra cotización
      </p>
      <div class="mt-10 flex items-center gap-x-4">
        <h4 class="flex-none text-sm font-semibold leading-6 text-[#007bff]">
          Recuerda que los datos pueden cambiar
        </h4>
      </div>
      <ul role="list" class="mt-8  text-sm leading-6 text-gray-600 sm:grid-cols-2 sm:gap-6">
          <li class="flex gap-x-3">
            <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
            </svg>
            Monto del préstamo <span class="text-[#007bff]">{{ result.dataForm.amount }}</span>
          </li>
        
          <li class="flex gap-x-3">
            <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
            </svg>
            Tasa  de intéres anual <span class="text-[#007bff]"> {{ result.dataForm.interestRate }}</span>
          </li>
          <li class="flex gap-x-3">
            <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
            </svg>
            Plazo de préstamo <span class="text-[#007bff]">{{ result.dataForm.paymentTime }}</span> meses
          </li>
        </ul>
     
    </div>
    <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
      <div
        class="rounded-2xl bg-gray-50 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16"
      >
        <div class="mx-auto max-w-xs px-8">
          <p class="text-base font-semibold text-gray-600">
            Su cuota mensual es 
          </p>
          <p class="mt-6 flex items-baseline justify-center gap-x-2">
            <span class="text-5xl font-bold tracking-tight text-gray-900"
              >L {{ result.result }}</span
            >
            <span
              class="text-sm font-semibold leading-6 tracking-wide text-gray-600"
              >LEMP</span
            >
          </p>
          <button
            type="button"
            class="mt-10 text-white px-3 py-2 bg-[#007bff] hover:bg-blue-600 font-semibold rounded-md text-sm w-full"
            @click="goBack()"
          >
            Volver a Calcular
          </button>
          <!-- <a
                href="#"
                class="mt-10 block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                >Volver a Calcular</a
              > -->
          <p class="mt-6 text-xs leading-5 text-gray-600">
            Los datos ingresados son confidenciales, puedes comunicarte con
            nosotros
          </p>
        </div>
      </div>
    </div>
  </div>
</template>
