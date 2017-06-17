<template>
    <div class="clock">
        <div class="clock__hours">
            <span class="clock__hourtime">{{hourtime}}</span>
            {{hours}}
        </div>
        <div class="clock__minutes">{{minutes}}</div>
        <div class="clock__seconds">{{seconds}}</div>
    </div>
</template>

<style>
    *,
*:before,
*:after {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.clock {
    background: #fff;
    border: .3rem solid #fff;
    border-radius: .5rem;
    display: inline-block;
    width: 100%;
}

.clock__hours,
.clock__minutes,
.clock__seconds {
    background: #00184a;
    display: inline-block;
    color: #fff;
    font-family: 'Nunito', sans-serif;
    font-size: 3rem;
    font-weight: 300;
    padding: .5rem 1rem;
    text-align: center;
    position: relative;
}

.clock__hours {
    border-right: .15rem solid #fff;
    border-radius: .5rem 0 0 .5rem;
    padding-top: 10px;
}
.clock__minutes {
    border-right: .15rem solid #fff;
    padding-top: 10px;
}
.clock__seconds {
    border-radius: 0 .5rem .5rem 0;
    padding-top: 10px;
}

.clock__hourtime {
    font-size: 1rem;
    position: absolute;
    top: 2px;
    left: 8px;
}
</style>

<script>
import { getHourTime, getZeroPad } from '../functions'

export default {
  data () {
    return {
      hours: '',
      minutes: '',
      seconds: '',
      hourtime: ''
    }
  },
  mounted () {
    setInterval(this.updateDateTime, 1000)
  },
  methods: {
    updateDateTime () {
      let now = new Date()

      this.hours = now.getHours()
      this.minutes = getZeroPad(now.getMinutes())
      this.seconds = getZeroPad(now.getSeconds())
      this.hourtime = getHourTime(this.hours)
      this.hours = this.hours % 12 || 12
    }
  }
}
</script>