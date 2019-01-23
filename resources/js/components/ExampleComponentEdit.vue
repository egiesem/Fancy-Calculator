<template>
     <div class="container align-items-center">
        <div class="row">
          <div class="col-lg-5 col-md-8 ml-auto mr-auto">
            <div class="card card-coin card-plain">
              <div class="card-header">
                <img src="assets/img/mike.jpg" class="img-center img-fluid rounded-circle">
                <i data-toggle="modal" data-target="#myModal2" class="fa fa-history float-left cursor" @click="myhistories()"></i>
                <i data-toggle="modal" data-target="#myModal1" class="fa fa-database float-right cursor" @click="allhistories()"></i>
              </div>
              <!-- <input v-model="formula"> -->
              <div class="card-body">
                  <h1 class="text-right" style="font-size: 80px">{{result}}</h1> 
                  <hr>
                  <h4 class="text-right">{{formula}}</h4> 
               
                  <div class="tab-pane active" id="linka">
                    
                      <div class="row text-center cursor" style="font-size: 325%;" >
                            <div class="col-3 btn-primary calc-btn"  @click="cleanAll()">
                               <small> C</small>
                            </div>
                            <div class="col-3 btn-primary calc-btn" @click="operate('(')">
                                <small>(  </small>
                            </div>
                            <div class="col-3 btn-primary calc-btn" @click="operate(')')">
                                <small>)</small> 
                            </div>
                            <div class="col-3 btn-primary calc-btn"  @click="drop()">
                                <small><i class="fa fa-arrow-left"></i></small>
                            </div> 

                            <div class="col-3 btn-primary calc-btn"  @click="operate(7)">
                                <small>7</small>
                            </div>
                            <div class="col-3 btn-primary calc-btn" @click="operate(8)">
                                <small>8</small>
                            </div>
                            <div class="col-3 btn-primary calc-btn" @click="operate(9)">
                                <small>9 </small>
                            </div>
                            <div class="col-3 btn-primary calc-btn" @click="operate('/')">
                                <small>/</small>
                            </div> 

                            <div class="col-3 btn-primary calc-btn" @click="operate(4)">
                                <small>4</small>
                            </div>
                            <div class="col-3 btn-primary calc-btn" @click="operate(5)">
                                <small>5 </small> 
                            </div>
                            <div class="col-3 btn-primary calc-btn" @click="operate(6)">
                                <small>6 </small>
                            </div>
                            <div class="col-3 btn-primary calc-btn" @click="operate('*')">
                                <small>*</small>
                            </div> 
                            
                            <div class="col-3 btn-primary calc-btn" @click="operate(1)">
                                <small>1</small>
                            </div>
                            <div class="col-3 btn-primary calc-btn" @click="operate(2)">
                                <small>2  </small>
                            </div>
                            <div class="col-3 btn-primary calc-btn" @click="operate(3)">
                                <small>3 </small>
                            </div>
                            <div class="col-3 btn-primary calc-btn" @click="operate('-')">
                                <small>-</small>
                            </div> 

                            <div class="col-3 btn-primary calc-btn" @click="operate(0)">
                                <small>0</small>
                            </div>
                            <div class="col-3 btn-primary calc-btn" @click="operate('.')">
                                <small>.</small>  
                            </div>
                            <div class="col-3 btn-primary calc-btn" @click="pow">
                               <small> X<sup>n</sup> </small>
                            </div>
                            <div class="col-3 btn-primary calc-btn" @click="operate('+')">
                                <small>+</small>
                            </div> 

                            <div class="col-12 btn-primary calc-btn" @click="equal()">
                                <small>update</small>
                            </div> 
                            <div class="col-12 btn-info calc-btn" @click="kembali()">
                                <small>Kembali</small>
                            </div> 
                      </div>
                      
                  </div> <!--end div tab-pane -->
                 
              </div> <!--end div card body-->
            </div> <!--end div card-coin card-plain-->
          </div> <!--end div col-lg-5 col-md-8 ml-auto mr-auto-->
        <!-- Form Modal 2-->
        <div class="modal fade modal-black" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header justify-content-center">
                <div class="text-muted text-center">
                  <h3>Your Histories (by Ip Address)</h3>
                </div>
              </div>
              <div class="modal-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="plain-table">
                    <tbody>
                      <tr>
                        <th scope="row">Data</th>
                        <td>
                         
                        </td>
                        <td>
                          <button v-on:click="submitPostDeleteallmy()" class="btn btn-danger btn-round btn-sm pull-right" type="button" data-dismiss="modal">Clear All</button>
                          
                        </td>
                      </tr>
                      <tr v-for="(post,index) in laravelData.data" :key="post.id">
                        <th scope="row">{{((laravelData.current_page-1)*laravelData.per_page)+index+1}}.</th>
                        <td>
                          {{post.formula}} = {{post.result}}
                        </td>
                        <td>
                          <button v-on:click="submitPostDelete1(post.id, index)" class="btn btn-danger btn-round btn-sm pull-right" type="button" data-dismiss="modal">Clear</button>
                           <router-link :to="{name: 'editformula', params:{id:post.id}}" class="btn btn-warning btn-round btn-sm pull-right" data-dismiss="modal">Edit</router-link>
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="modal-footer">
                <pagination :data="laravelData" @pagination-change-page="myhistories" class="pagination">
                  <span class="page-item" slot="prev-nav">&lt; Previous</span>
                  <span class="page-item" slot="next-nav">Next &gt;</span>
                </pagination>
              </div>
            </div>
          </div>
        </div>
        <!--  End Modal -->
        <!-- Form Modal 1-->
        <div class="modal fade modal-black" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header justify-content-center">
                <div class="text-muted text-center">
                  <h3>All Histories</h3>
                </div>
              </div>
              <div class="modal-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="plain-table">
                    <tbody>
                      <tr>
                        <th scope="row">Data</th>
                        <td>
                         
                        </td>
                        <td>
                          <button v-on:click="submitPostDeleteall()" class="btn btn-danger btn-round btn-sm pull-right" type="button" data-dismiss="modal">Clear All</button>
                          
                        </td>
                      </tr>
                      <tr v-for="(post,index) in laravelData.data" :key="post.id">
                        <th scope="row">{{((laravelData.current_page-1)*laravelData.per_page)+index+1}}.</th>
                        <td>
                          {{post.formula}} = {{post.result}}
                        </td>
                        <td>
                          <button v-on:click="submitPostDelete1(post.id, index)" class="btn btn-danger btn-round btn-sm pull-right" type="button" data-dismiss="modal">Clear</button>
                          <button class="btn btn-warning btn-round btn-sm pull-right" type="button" data-dismiss="modal">Edit</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="modal-footer">
                <pagination :data="laravelData" @pagination-change-page="allhistories" class="pagination">
                  <span class="page-item" slot="prev-nav">&lt; Previous</span>
                  <span class="page-item" slot="next-nav">Next &gt;</span>
                </pagination>
              </div>
            </div>
          </div>
        </div>
        <!--  End Modal -->
        </div> <!--end div row-->
      </div> <!--end div container-->
</template>

<script>
import axios from 'axios';
export default {
    data () {
    return {
        laravelData: {},
        formula :'',
        result : 0 
        }
    },

   
    
    created() {
      let id = this.$route.params.id;
      axios.get(`/spesifik/` + id)
      .then(response => {
        this.formula = response.data.formula
        this.result = response.data.result
        // console.log(response.data.id)
      })
      .catch(e => {
        if(e.response.status==404){
          this.$router.push({path:'/'})
          swal ( "Oops" ,  "Data tidak ditemukan!" ,  "error" )
        }
      })
    },

    methods:{
        kembali(){
              this.$router.push({path:'/'})
        },
        operate(element){
            // console.log("operate..");
            this.formula +=element;
            // console.log("this.formula:");
            // console.log(this.formula);
        },

        equal(){
            // console.log("equal..");
            //   this.result = eval(this.formula);
            this.result = eval(this.formula);
            // console.log("this.formula:");
            console.log(this.formula);
            let id = this.$route.params.id;
            axios.put(`/updates/`+id , {'formula': this.formula,'result': this.result})
                .then(response => {
                
                this.$router.push({path:'/'})
                swal({
                  title: "Success!",
                  text: "Data updated!",
                  icon: "success",
                  button: "Aww yiss!",
                });
            })
        },

        cleanResult(){
            // console.log("cleanResult..");
            this.result = 0;
        },

        cleanAll(){
            // console.log("cleanAll..");
            this.formula = "";
            this.result = 0;
        },

        drop(){
            // console.log("drop..");
            this.formula = this.formula.slice(0, -1);
        },

        square(){
            // console.log("square..");
            console.log(eval(this.formula));
            eval(this.formula)<0? this.formula = "Can not suqre the negative value" : this.result=Math.sqrt(eval(this.formula));
        },

        devided(){
            // console.log("devided.."); 
            this.formula===""||this.formula.endsWith("+"||"-"||"*"||"/"||"%")? {} :  this.formula="1/("+this.formula+")";this.equal();
        },

        toggle(){
            // console.log("toggle.."); 
            this.formula===""||this.formula.endsWith("+"||"-"||"*"||"/"||"%")? {} :  this.formula.startsWith("-")?this.formula = Math.abs(eval(this.formula)).toString(): this.formula="-("+this.formula+")";
            this.equal();
        },
        pow() {
           
            this.result = Math.pow(parseFloat(this.formula),2); 
            this.formula=this.formula + '*' + this.formula; 
     
            axios.post('/historyadd', {'formula': this.formula,'result': this.result})
                    .then(response => {
                    // this.posts = response.data
                    // console.log("berhasil");
                })
        },
        myhistories(page = 1) {
            axios.get(`/getmyhistories?page=` + page)
            .then(response => {
              this.laravelData = response.data;
            })
            .catch(e => {
              this.errors.push(e)
              if(e.response.status==404){
               console.log('kosong');
              }
            })
        },
        allhistories(page = 1) {
            axios.get(`/getallhistories?page=` + page)
            .then(response => {
              this.laravelData = response.data;
              // console.log('berjalan');
            })
            .catch(e => {
              this.errors.push(e)
              if(e.response.status==404){
               console.log('kosong');
              }
            })
        },
        submitPostDelete1(id, index) {
          // console.log(id);
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
              if (result) {
                axios.delete(`/clean/`+id )
                .then(response => {
                  swal("Poof! Your data has been deleted!", {
                    icon: "success",
                  });
                  // console.log(response)
                  this.allhistories()
                })
                .catch(e => {
                  // this.errors.push(e)
                  // console.log(e)
                  swal("Error! Cannot delete your data!", {
                    icon: "error",
                  });
                })
              }
            })
        }
        ,
        submitPostDelete2(id, index) {
          // console.log(id);
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
              if (result) {
                axios.delete(`/clean/`+id )
                .then(response => {
                  swal("Poof! Your data has been deleted!", {
                    icon: "success",
                  });
                  // console.log(response)
                  this.myhistories()
                })
                .catch(e => {
                  // this.errors.push(e)
                  // console.log(e)
                  swal("Error! Cannot delete your data!", {
                    icon: "error",
                  });
                })
              }
            })
        }
        ,
        submitPostDeleteallmy() {
          // console.log(id);
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
              if (result) {
                axios.delete(`/cleanallmy/`)
                .then(response => {
                  // this.myhistories()
                  this.$router.push({path:'/'})
                  swal("Poof! Your data has been deleted!", {
                    icon: "success",
                  });
                  
                  
                })
                .catch(e => {
                  // this.errors.push(e)
                  // console.log(e)
                  swal("Error! Cannot delete your data!", {
                    icon: "error",
                  });
                })
              }
            })
        },
        submitPostDeleteall() {
          // console.log(id);
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
              if (result) {
                axios.delete(`/cleanall/`)
                .then(response => {
                  // this.allhistories()
                  this.$router.push({path:'/'})
                  swal("Poof! Your data has been deleted!", {
                    icon: "success",
                  });
                  
                })
                .catch(e => {
                  // this.errors.push(e)
                  // console.log(e)
                  swal("Error! Cannot delete your data!", {
                    icon: "error",
                  });
                })
              }
            })
        },

    }
}
</script>
