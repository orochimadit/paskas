<template>
  <Head>
    <title>Add New PASKAS - Aplikasi PASKAS</title>
  </Head>
  <main class="c-main">
    <div class="container-fluid">
      <div class="fade-in">
        <div class="row">
          <div class="col-md-12">
            <div class="card border-0 rounded-3 shadow border-top-purple">
              <div class="card-header">
                <span class="font-weight-bold"
                  ><i class="fa fa-folder"></i> ADD NEW PASKAS</span
                >
              </div>
              <div class="card-body">
                <form @submit.prevent="submit">
                  <div class="mb-3">
                    <label class="fw-bold"> Name</label>
                    <input
                      class="form-control"
                      v-model="form.name"
                      :class="{ 'is-invalid': errors.name }"
                      type="text"
                      placeholder="Nama Lengkap"
                    />

                    <div v-if="errors.name" class="alert alert-danger">
                      {{ errors.name }}
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="fw-bold"> Tempat Lahir</label>
                    <input
                      class="form-control"
                      v-model="form.place_of_birth"
                      :class="{ 'is-invalid': errors.place_of_birth }"
                      type="text"
                      placeholder="Tempat Lahir"
                    />

                    <div v-if="errors.place_of_birth" class="alert alert-danger">
                      {{ errors.place_of_birth }}
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="fw-bold"> Status Perkawinan</label>
                    <select
                      class="form-select"
                      v-model="form.marital_status" 
                    >
                      <option value="">--Pilih StatusPerkawinan--</option>
                      <!-- <option
                        v-for="village  in state.destinationVillages"
                        :key="village.id"
                        :value="village.name"
                      >
                        {{ village.name }}
                      </option> -->
                    </select>
                  </div>
                  <div v-if="errors.marital_status" class="alert alert-danger">
                    {{ errors.marital_status }}
                  </div>
                  <div class="mb-3">
                    <label class="fw-bold"> Jumlah Anak</label>
                    <input
                      class="form-control"
                      v-model="form.number_of_children"
                      :class="{ 'is-invalid': errors.number_of_children }"
                      type="text"
                      placeholder="Jumlah Anak"
                    />

                    <div v-if="errors.number_of_children" class="alert alert-danger">
                      {{ errors.number_of_children }}
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="fw-bold"> Golongan Darah</label>
                    <select
                      class="form-select"
                      v-model="form.blood_group" 
                    >
                      <option value="">--Pilih Golongan Darah--</option>
                      <!-- <option
                        v-for="village  in state.destinationVillages"
                        :key="village.id"
                        :value="village.name"
                      >
                        {{ village.name }}
                      </option> -->
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="fw-bold">Asal Provinsi</label>
                    <select
                      class="form-select"
                      v-model="form.homeProvince"
                      @change="getRegencies"
                    >
                      <option value="">--Pilih Asal Provinsi--</option>
                      <option
                        v-for="province in state.provinces"
                        :key="province.id"
                        :value="province.id"
                      >
                        {{ province.name }}
                      </option>
                    </select>
                  </div>
                  <div v-if="errors.province" class="alert alert-danger">
                    {{ errors.province }}
                  </div>
                  <div class="mb-3">
                    <label class="fw-bold"> Asal Kota/Kabupaten</label>
                    <select
                      class="form-select"
                      v-model="form.homeRegency"
                      @change="getDistricts"
                    >
                      <option value="">--Pilih Asal Kota/ Kabupaten--</option>
                      <option
                        v-for="regency in state.regencies"
                        :key="regency.id"
                        :value="regency.id"
                      >
                        {{ regency.name }}
                      </option>
                    </select>
                  </div>
                  <div v-if="errors.regency" class="alert alert-danger">
                    {{ errors.regency }}
                  </div>
                  <div class="mb-3">
                    <label class="fw-bold">Asal Kecamatan</label>
                    <select
                      class="form-select"
                      v-model="form.homeDistrict"
                      @change="getVillages"
                    >
                      <option value="">--Pilih Asal Kecamatan--</option>
                      <option
                        v-for="district in state.districts"
                        :key="district.id"
                        :value="district.id"
                      >
                        {{ district.name }}
                      </option>
                    </select>
                  </div>
                  <div v-if="errors.regency" class="alert alert-danger">
                    {{ errors.regency }}
                  </div>
                  <div class="mb-3">
                    <label class="fw-bold">Asal Desa</label>
                    <select class="form-select" v-model="form.homeVillage">
                      <option value="">--Pilih Asal Desa--</option>
                      <option
                        v-for="village in state.villages"
                        :key="village.id"
                        :value="village.id"
                      >
                        {{ village.name }}
                      </option>
                    </select>
                  </div>
                  <div v-if="errors.village" class="alert alert-danger">
                    {{ errors.village }}
                  </div>

                  <div class="mb-3">
                    <label class="fw-bold">Alamat Lengkap</label>
                    <input
                      class="form-control"
                      v-model="form.address"
                      :class="{ 'is-invalid': errors.address }"
                      type="text"
                      placeholder="Alamat Lengkap Beserta Nomor Rumah, Gang RT/RW serta Kode Pos"
                    />
                  </div>
                  <div v-if="errors.address" class="alert alert-danger">
                    {{ errors.address }}
                  </div>
                  <div class="mb-3">
                    <label class="fw-bold">Nomor Handphone / Wa</label>
                    <input
                      class="form-control"
                      v-model="form.phone_number"
                      :class="{ 'is-invalid': errors.phone_number }"
                      type="text"
                      placeholder="Nomor Whatsapp"
                    />
                  </div>
                  <div v-if="errors.phone_number" class="alert alert-danger">
                    {{ errors.phone_number }}
                  </div>
                  <div class="mb-3">
                    <label class="fw-bold">Profesi</label>
                    <input
                      class="form-control"
                      v-model="form.profession"
                      :class="{ 'is-invalid': errors.profession }"
                      type="text"
                      placeholder="Profesi"
                    />
                  </div>
                  <div v-if="errors.profession" class="alert alert-danger">
                    {{ errors.professiond }}
                  </div>
                  <div class="mb-3">
                    <label class="fw-bold">Kemampuan Membaca Al-qur'an</label>
                    <br />
                    <div class="form-check form-check-inline">
                      <input
                        class="form-check-input"
                        type="radio"
                        v-model="form.quran"
                        value="A"
                      />
                      <label class="form-check-label">A</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input
                        class="form-check-input"
                        type="radio"
                        v-model="form.quran"
                        value="B"
                      />
                      <label class="form-check-label">B</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input
                        class="form-check-input"
                        type="radio"
                        v-model="form.quran"
                        value="C"
                      />
                      <label class="form-check-label">C</label>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="fw-bold">Bergabung paskas via</label>
                    <input
                      class="form-control"
                      v-model="form.join"
                      :class="{ 'is-invalid': errors.join }"
                      type="text"
                      placeholder=""
                    />
                  </div>
                  <div v-if="errors.join" class="alert alert-danger">
                    {{ errors.join }}
                  </div>
                  <div class="mb-3">
                    <label class="fw-bold">Tahun Bergabung</label>
                    <input
                      class="form-control"
                      v-model="form.year_joined"
                      :class="{ 'is-invalid': errors.year_joined }"
                      type="text"
                      placeholder="Tahun Bergabung"
                    />
                  </div>
                  <div v-if="errors.year_joined" class="alert alert-danger">
                    {{ errors.year_joined }}
                  </div>
                  <div class="mb-3">
                    <label class="fw-bold">Riwayat Pendidikan</label>
                    <input
                      class="form-control"
                      v-model="form.educational_history"
                      :class="{ 'is-invalid': errors.educational_history }"
                      type="text"
                      placeholder="Riwayat Pendidikan"
                    />
                  </div>
                  <div v-if="errors.educational_history" class="alert alert-danger">
                    {{ errors.educational_history }}
                  </div>
                  <div class="mb-3">
                    <label class="fw-bold">Jabatan Paskas</label>
                    <input
                      class="form-control"
                      v-model="form.position_paskas"
                      :class="{ 'is-invalid': errors.position_paskas }"
                      type="text"
                      placeholder="Jabatan Paskas"
                    />
                  </div>
                  <div v-if="errors.position_paskas" class="alert alert-danger">
                    {{ errors.position_paskas }}
                  </div>
                  <div class="mb-3">
                    <label class="fw-bold">Keahlian</label>
                    <input
                      class="form-control"
                      v-model="form.skill"
                      :class="{ 'is-invalid': errors.skill }"
                      type="text"
                      placeholder="Keahlian"
                    />
                  </div>
                  <div v-if="errors.skill" class="alert alert-danger">
                    {{ errors.skill }}
                  </div>
                  <div class="mb-3">
                    <label class="fw-bold">Organisasi Diluar Paskas</label>
                    <input
                      class="form-control"
                      v-model="form.organization"
                      :class="{ 'is-invalid': errors.organization }"
                      type="text"
                      placeholder="Organisasi Diluar Paskas"
                    />
                  </div>
                  <div v-if="errors.organization" class="alert alert-danger">
                    {{ errors.organization }}
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <button
                        class="btn btn-primary shadow-sm rounded-sm"
                        type="submit"
                      >
                        SAVE
                      </button>
                      <button
                        class="btn btn-warning shadow-sm rounded-sm ms-3"
                        type="reset"
                      >
                        RESET
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>
  
  <script>
//import layout App
import LayoutApp from "../../../Layouts/App.vue";

//import Heade and Link from Inertia
import { Head, Link } from "@inertiajs/inertia-vue3";

//import reactive from vue
import { reactive, onMounted } from "vue";

//import inerita adapter
import { Inertia } from "@inertiajs/inertia";

//import sweet alert2
import Swal from "sweetalert2";

import axios from "axios";

export default {
  //layout
  layout: LayoutApp,

  //register components
  components: {
    Head,
    Link,
  },

  //props
  props: {
    errors: Object,
  },
  //   state:{
  //     regencies:[]
  //   },

  //composition API
  setup(props) {
    //define form with reactive
    const form = reactive({
      hometown: "",
      destination: "",
      business_cost: "",
      category: "",
      modes: "",
      homeProvince: "",
      homeRegency: "",
      homeDistrict: "",
      homeVillage: "",
      destinationProvince: "",
      destinationRegency: "",
      destinationDistrict: "",
      destinationVillage: "",
    });

    const state = reactive({
      provinces: [],
      regencies: [],
      districts: [],
      villages: [],
      destinationProvinces: [],
      destinationRegencies: [],
      destinationDistricts: [],
      destinationVillages: [],
    });
    // console.log(state.regencies + "1");
    // console.log(props.provinces);

    const getProvinces = () => {
      axios
        .get(`/apps/provinces`)
        .then((response) => {
          //   console.log(response.data);
          state.provinces = response.data;
          console.log(state.provinces);
        })
        .catch((error) => {
          console.log(error);
        });
    };

    const getRegencies = () => {
      if (form.homeProvince) {
        axios
          .get(`/apps/provinces/` + form.homeProvince)
          .then((response) => {
            //   console.log(response.data);
            state.regencies = response.data;
            console.log(state.regencies);
          })
          .catch((error) => {
            console.log(error);
          });
      } else {
        state.regencies = [];
      }
    };

    // console.log(props.provinces);
    const getDistricts = () => {
      axios
        .get(`/apps/regencies/` + form.homeRegency)
        .then((response) => {
          //  console.log(response);
          state.districts = response.data;
          //   console.log(districts);
        })
        .catch((error) => {
          console.log(error);
        });
    };

    // console.log(props.provinces);
    const getVillages = () => {
      axios
        .get(`/apps/districts/` + form.homeDistrict)
        .then((response) => {
          //   console.log(response);
          state.villages = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    };

    //method "submit"
    const submit = () => {
      //send data to server
      Inertia.post(
        "/apps/transportations",
        {
          //data
          hometown_province_id: form.homeProvince,
          hometown_regency_id: form.homeRegency,
          hometown_district_id: form.homeDistrict,
          hometown_village_id: form.homeVillage,
          business_cost: form.business_cost,
          category: form.category,
          modes: form.modes,
        },
        {
          onSuccess: () => {
            //show success alert
            Swal.fire({
              title: "Success!",
              text: "Transportations saved successfully.",
              icon: "success",
              showConfirmButton: false,
              timer: 2000,
            });
          },
        }
      );
    };

    onMounted(() => {
      getProvinces();
      getDestinationProvinces();
      //   console.log(getProvinces());
    });

    return {
      state,
      getRegencies,
      getDistricts,
      getVillages,
      onMounted,
      form,
      submit,
    };
  },
};
</script>
  
  <style>
</style>