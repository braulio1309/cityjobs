<template>
  <div id="wrapper">
    <!-- Header Container
================================================== -->

    <div class="clearfix"></div>
    <!-- Header Container / End -->

    <backend-header :invitado="invitados" :user="user" />
    <!-- Intro Banner
================================================ -->
    <!-- add class "disable-gradient" to enable consistent background overlay -->
    <div class="intro-banner" data-background-image="images/fondito.png">
      <div class="container">
        <!-- Intro Headline -->
        <div class="row">
          <div class="col-md-12">
            <div class="banner-headline">
              <h3>
                <strong></strong> <strong class="color">CityJob</strong>
                <strong
                  >te permitirá encontrar empleo de forma rápida y fácil y a su
                  vez ser contratado gracias al avance de nuestro
                  sistema.</strong
                >
                <br />
              </h3>
            </div>
          </div>
        </div>

        <!-- Search Bar -->
        <div class="row">
          <div class="col-md-12">
            <div class="intro-banner-search-form margin-top-95">
             
              <div class="intro-search-field">
                <label for="intro-keywords" class="field-title ripple-effect"
                  >¿Qué trabajo ofreces?
                </label>
                <input
                  id="intro-keywords"
                  type="text"
                  placeholder="Titulo o palabra clave"
                />
              </div>
              <div class="intro-search-field with-autocomplete">
                <label
                  for="autocomplete-input"
                  class="field-title ripple-effect"
                  >¿Donde?</label
                >
                <div class="input-with-icon">
                  <input
                    id="autocomplete-input"
                    type="text"
                    placeholder="Leioa"
                  />
                  <i class="icon-material-outline-location-on"></i>
                </div>
              </div>

              <!-- Button -->
              <div class="intro-search-button">
                <button
                  class="button ripple-effect"
                 
                >
                  Buscar
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Stats -->
        <div class="row">
          <div class="col-md-12">
            <ul class="intro-stats margin-top-45 hide-under-992px">
              <li>
                <strong class="counter">{{total_ofertas}}</strong>
                <span>Ofertas de trabajo</span>
              </li>
              <li>
                <strong class="counter">{{total_usrs}}</strong>
                <span>Usuarios satisfechos</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Content
                ================================================ -->
    <!-- Category Boxes -->
    <div class="section margin-top-65">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="section-headline centered margin-bottom-15">
              <h3>Categorías populares</h3>
            </div>

            <!-- Category Boxes Container -->
            <div class="categories-container">
              <!-- Category Box -->
              <a href="ofertas.html" class="category-box">
                <div class="category-box-icon">
                  <i class="icon-line-awesome-file-code-o"></i>
                </div>
                <div class="category-box-counter">612</div>
                <div class="category-box-content">
                  <h3>Programación</h3>
                  <p>Ingenieros, Programadores</p>
                </div>
              </a>

              <!-- Category Box -->
              <a href="ofertas.html" class="category-box">
                <div class="category-box-icon">
                  <i class="icon-line-awesome-cloud-upload"></i>
                </div>
                <div class="category-box-counter">113</div>
                <div class="category-box-content">
                  <h3>Analistas</h3>
                  <p>Especialista en datos / científico, analista de datos</p>
                </div>
              </a>

              <!-- Category Box -->
              <a href="ofertas.html" class="category-box">
                <div class="category-box-icon">
                  <i class="icon-line-awesome-suitcase"></i>
                </div>
                <div class="category-box-counter">186</div>
                <div class="category-box-content">
                  <h3>Consultores</h3>
                  <p>Auditor, Contador, Analista Financiero</p>
                </div>
              </a>

              <!-- Category Box -->
              <a href="ofertas.html" class="category-box">
                <div class="category-box-icon">
                  <i class="icon-line-awesome-pencil"></i>
                </div>
                <div class="category-box-counter">298</div>
                <div class="category-box-content">
                  <h3>Escritura y traducciones</h3>
                  <p>Redactor, escritor creativo, traductor</p>
                </div>
              </a>

              <!-- Category Box -->
              <a href="ofertas.html" class="category-box">
                <div class="category-box-icon">
                  <i class="icon-line-awesome-pie-chart"></i>
                </div>
                <div class="category-box-counter">549</div>
                <div class="category-box-content">
                  <h3>Ventas y Marketing</h3>
                  <p>Gerente de Marca, Coordinador de Marketing</p>
                </div>
              </a>

              <!-- Category Box -->
              <a href="ofertas.html" class="category-box">
                <div class="category-box-icon">
                  <i class="icon-line-awesome-image"></i>
                </div>
                <div class="category-box-counter">873</div>
                <div class="category-box-content">
                  <h3>Diseño gráfico</h3>
                  <p>Director Creativo, Diseñador Web</p>
                </div>
              </a>

              <!-- Category Box -->
              <a href="ofertas.html" class="category-box">
                <div class="category-box-icon">
                  <i class="icon-line-awesome-bullhorn"></i>
                </div>
                <div class="category-box-counter">125</div>
                <div class="category-box-content">
                  <h3>Marketing Digital</h3>
                  <p>Analista de marketing, redes sociales</p>
                </div>
              </a>

              <!-- Category Box -->
              <a href="ofertas.html" class="category-box">
                <div class="category-box-icon">
                  <i class="icon-line-awesome-graduation-cap"></i>
                </div>
                <div class="category-box-counter">445</div>
                <div class="category-box-content">
                  <h3>Educación</h3>
                  <p>Asesor, Entrenador, Coordinador de Educación</p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Category Boxes / End -->

    <!-- Features Jobs -->
    <div class="section gray margin-top-45 padding-top-65 padding-bottom-75">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <!-- Section Headline -->

            <!-- aqui va la descripcion que quien sabe -->
          </div>
        </div>
      </div>
    </div>

    <div
      class="section padding-top-65 padding-bottom-70 full-width-carousel-fix"
    >
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <!-- Section Headline -->
            <div class="section-headline margin-top-0 margin-bottom-25">
              <h3>Profesionales destacados</h3>
              <a href="/profesionales" class="headline-link">Ver todos</a>
            </div>
          </div>

          <div class="col-xl-12">
            <div
              class="default-slick-carousel freelancers-container freelancers-grid-layout"
            >
              <!--Freelancer -->
              <div class="freelancer">
                <!-- Overview -->
                <div class="freelancer-overview">
                  <div class="freelancer-overview-inner">
                    <!-- Bookmark Icon -->
                    <span class="megusta-icon"></span>

                    <!-- Avatar -->
                    <div class="freelancer-avatar">
                      <div class="verified-badge"></div>
                      <a href="single-freelancer-profile.html"
                        ><img src="images/user-avatar-placeholder.png" alt=""
                      /></a>
                    </div>

                    <!-- Name -->
                    <div class="freelancer-name">
                      <h4><a href="#">Gabriel Lagueux </a></h4>
                      <span>Camarero</span>
                    </div>

                    <!-- Rating -->
                    <div class="freelancer-rating">
                      <div class="star-rating" data-rating="5.0"></div>
                    </div>
                  </div>
                </div>

                <!-- Details -->
                <div class="freelancer-details">
                  <div class="freelancer-details-list">
                    <ul>
                      <li>
                        Ubicación
                        <strong
                          ><i class="icon-material-outline-location-on"></i>
                          Santutxu</strong
                        >
                      </li>
                      <li>Costo hora <strong>&euro;50 / hr</strong></li>
                    </ul>
                  </div>
                  <a
                    href="single-freelancer-profile.html"
                    class="button button-sliding-icon ripple-effect"
                    >Ver perfil
                    <i class="icon-material-outline-arrow-right-alt"></i
                  ></a>
                </div>
              </div>
              <!-- Freelancer / End -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Highest Costo horad Freelancers / End-->
    <modalog
      :errors="errors"
      :flash="flash"
      :abremodal="abremodal"
      :invitado="invitados"
    />
    <footer-vue :invitado="invitados" :user="user" />
  </div>
</template>

<script>
import FooterVue from "../Components/Backend/Footer.vue";
import BackendHeader from "../Components/Backend/Header.vue";
import Modalog from "../Components/Backend/Modalog.vue";

export default {
  components: {
    BackendHeader,
    Modalog,
    FooterVue,
  },
  props: {
    invitados: Boolean,
    errors: Object,
    flash: Object,
    user: Object,
    abremodal: Boolean,
    total_usrs: Number,
  },
  data() {
    return {};
  },
};
</script>
