<template>
<div>
<section class="box-white hidden-print">
  <div class="container">
    <div class="row">
    <div class="col-sm-12 text-center paddingTopBottom10 advertisement">
    </div>
    </div>
  </div>
</section>
<main id="main-content">
  <section class="leadBox paddingTop20">
      <div class="container">
            <Section1></Section1>
      </div>
       <div class="container">
            <Section3></Section3>
      </div>
  </section>
</main>
</div>
</template>
<script>
import Section1 from './section/Section1.vue'
import Section3 from './section/Section3.vue'

export default {
  components: {
    Section1,
    Section3,
  }
}
</script>

<style>

</style>
