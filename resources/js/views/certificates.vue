<template>
    <div>
        <div>
            <h3 class="font-sm">Certificate Download</h3>
        </div>

        <div class="mt-3">
            <a href="" @click.prevent="download" class="p-2 text-white bg-green-600">Download</a>
        </div>
        <div>
            <form>
                <input type="text" name="name" id="name" v-model="certificate.name">
            </form>
        </div>
    </div>
</template>

<script>

import axios from 'axios';
export default {
    data() {
        return {
            certificate: {
                name: 'sichali numnanfdif',
                order_id: '',
                customer_id: '', 
                language: '',
                sponsor: '',
            }
        }
    },
    methods:{
        download() {
           axios.post('/certificate', this.certificate, { 
                responseType: 'blob',
            })
                .then((response) => {
                    console.log(response.data);
                    const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement("a");
                    link.href = url;
                    link.setAttribute("download", "created.jpg"); //or any other extension
                    document.body.appendChild(link);
                    link.click();
                })
                .catch(() => {});
        }
    }
}
</script>