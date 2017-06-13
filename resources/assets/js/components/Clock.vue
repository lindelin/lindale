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

<script>
import { getHourTime, getZeroPad } from '../filters'

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