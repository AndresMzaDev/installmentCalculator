<script setup>
import { reactive, ref } from "vue";
import Instructions from "./components/Instructions.vue";
import ResultQuota from "./components/ResultQuota.vue";
import Alert from "./components/Alert.vue";
import axios from "axios";
// libreria de formato numerico
import { directive as VNumber } from "@coders-tm/vue-number-format";
const directives = {
  number: VNumber,
};

const amount = {
  decimal: ".",
  separator: ",",
  prefix: "L ",
  precision: 2,
  nullValue: "",
  // "minimumFractionDigits": 2,
  prefill: false,
};
const rate = {
  decimal: ".",
  separator: ",",
  prefix: "% ",
  precision: 2,
  masked: false,
};

const resultQuota = ref(null);
const isCompleteForm = ref(false);
const layoutResult = ref(false);
const form = reactive({
  amount: null,
  interestRate: null,
  paymentTime: null,
});

function getAmountFormat(item) {
  return item.replace(/[,\L]/g, "");
}
function getInterestFormat(item) {
  return item.replace(/%/g, "");
}

function goBack() {
  console.log("componente principal");
  form.amount = null
  form.interestRate = null
  form.paymentTime = null
  layoutResult.value = !layoutResult.value;
}

async function SendRequest() {
  if (
    form.amount != null &&
    form.interestRate != null &&
    form.paymentTime != null
  ) {
    const formData = {
      amount: getAmountFormat(form.amount),
      interestRate: getInterestFormat(form.interestRate),
      paymentTime: form.paymentTime,
    };
    console.log("form data..", formData);
    var api = `http://localhost:8888/backend-php/`;
    await axios
      .post(api, formData, {
        headers: { "content-type": "application/x-www-form-urlencoded" },
      })
      .then((response) => {
        console.log("Response.... ", response);
        if (response.data?.result) {
          resultQuota.value = response.data.result;
          layoutResult.value = true;
          console.log("result", layoutResult.value);
        } else {
          console.log("error");
        }
      })
      .catch((error) => {
        console.log("err", error);
      });
  } else {
    console.log("Se esta calculando");
    ManagerAlert();
  }
}

function ManagerAlert() {
  isCompleteForm.value = true;
  setTimeout(() => {
    isCompleteForm.value = false;
  }, 3000);
}
</script>

<template>
  <div class="pt-24 bg-gray-100 h-screen">
    <Transition mode="out-in" name="slide-fade">
      <div
        class="grid sm:grid-cols-2 items-center gap-16 p-8 mx-auto max-w-4xl bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-3xl text-[#333] font-[sans-serif]"
        v-if="!layoutResult"
        id="principal"
      >
        <div>
          <h1 class="text-3xl font-extrabold">Calculadora de Cuotas</h1>
          <p class="text-sm text-gray-400 mt-3">
            Bienvenido a la calculadora de cuotas mensual, ingresa los datos
            solicitados para calcular el aproximado de la cuota mensual,
            recuerda que esta información es confidencial.
          </p>
          <div class="mt-12">
            <Instructions />
          </div>
        </div>
        <div>
          <div class="flex justify-end mb-5">
            <img class="" src="../src/assets/log3.svg" alt="" />
          </div>
          <form method="post" class="ml-auo space-y-4">
            <input
              v-model="form.amount"
              v-number="amount"
              placeholder="Monto del préstamo"
              class="w-full mt-1 rounded-md py-2.5 px-4 border text-sm outline-[#007bff]"
            />
            <input
              v-model="form.interestRate"
              v-number="rate"
              placeholder="Tasa  de intéres anual %"
              class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#007bff]"
            />
            <input
              v-model="form.paymentTime"
              type="number"
              placeholder="Plazo de préstamo (meses)"
              class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#007bff]"
            />

            <Transition mode="out-in" name="bounce">
              <Alert v-if="isCompleteForm" />
              <Alert v-else class="invisible" />
            </Transition>
            <button
              type="button"
              class="text-white bg-[#007bff] hover:bg-blue-600 font-semibold rounded-md text-sm px-4 py-2.5 w-full"
              @click="SendRequest()"
            >
              Calcular
            </button>
          </form>
        </div>
      </div>
      <div
        v-else
        id="secondary"
        class="mx-auto max-w-4xl bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-3xl text-[#333] font-[sans-serif]"
      >
        <ResultQuota
          :result="resultQuota"
          :dataForm="form"
          @goBack="goBack()"
        />
      </div>
    </Transition>
  </div>
</template>

<style scoped>
img {
  width: 5rem;
}
.bounce-enter-active {
  animation: bounce-in 0.5s;
}
.bounce-leave-active {
  animation: bounce-in 0.5s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.1);
  }
  100% {
    transform: scale(1);
  }
}

.slide-fade-enter-active {
  transition: all 0.4s ease-out;
}

.slide-fade-leave-active {
  transition: all 0.4s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
  transform: translateX(10px);
  opacity: 0;
}
</style>
