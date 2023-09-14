'use strict';
const bcrypt = require('bcrypt');

/** @type {import('sequelize-cli').Migration} */
module.exports = {
  async up (queryInterface, Sequelize) {
    
      await queryInterface.bulkInsert('users', [
        {
        name: 'John Doe',
        profession: "Admin Micro",
        role: "admin",
        email: "admin@mail.com",
        password: await bcrypt.hash('admin', 10),
        created_at: new Date(),
        updated_at: new Date(),
        },
        {
          name: 'Adit',
          profession: "Backend",
          role: "student",
          email: "adit@mail.com",
          password: await bcrypt.hash('adit', 10),
          created_at: new Date(),
          updated_at: new Date(),
        },

    ]);
    
  },

  async down (queryInterface, Sequelize) {
   
     await queryInterface.bulkDelete('users', null, {});
     
  }
};
