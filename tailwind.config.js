module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontSize: {


      },
      translate: {
        '50': 'translateY(-50%)',
      },
      border: {
        '_1': '1px',
      },
      width: {
        'px-70': '70px',
      },
      height: {
        'px-457': '457px'
      },
      colors: {
        'ED165F': '#ED165F'
      },
      keyframes: {
        'fade-in-down': {
          "from": {
            transform: "translateY(-0.75rem)",
            opacity: '0'
          },
          "to": {
            transform: "translateY(0rem)",
            opacity: '1'
          },
        },
      },
      animation: {
        'fade-in-down': "fade-in-down 0.2s ease-in-out both",
      },
    },
  },
  plugins: [],
}
