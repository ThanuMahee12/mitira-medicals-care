'use strict';
/** @type {import('sequelize-cli').Migration} */
module.exports = {
  async up(queryInterface, Sequelize) {
    await queryInterface.createTable('Roles', {
      id: {
        allowNull: false,
        autoIncrement: true,
        primaryKey: true,
        type: Sequelize.INTEGER
      },
      role_name: {
        type: Sequelize.STRING,
        allowNull: false,
        unique: true // Ensure role_name is unique
      },
      description: {
        type: Sequelize.TEXT,
        allowNull: true // description allows null
      },
      auth_code: {
        type: Sequelize.INTEGER,
        allowNull: true // auth_code allows null
      },
      createdAt: {
        allowNull: false,
        type: Sequelize.DATE
      },
      updatedAt: {
        allowNull: false,
        type: Sequelize.DATE
      },
      deletedAt: {       // Soft delete column
        type: Sequelize.DATE,
        allowNull: true   // null means not deleted
      }
    });
  },

  // eslint-disable-next-line no-unused-vars
  async down(queryInterface, Sequelize) {
    await queryInterface.dropTable('Roles');
  }
};
