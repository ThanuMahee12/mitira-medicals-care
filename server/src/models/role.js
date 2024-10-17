'use strict';
const {
  Model
} = require('sequelize');

module.exports = (sequelize, DataTypes) => {
  class Role extends Model {
    static associate(models) {
      // define associations here
    }
  }
  
  Role.init({
    role_name: {
      type: DataTypes.STRING,
      allowNull: false,
      unique: true // role_name must be unique
    },
    description: {
      type: DataTypes.TEXT,
      allowNull: true // description allows null
    },
    auth_code: {
      type: DataTypes.INTEGER,
      allowNull: true // auth_code allows null
    }
  }, {
    sequelize,
    modelName: 'Role',
    timestamps: true,   // Adds createdAt and updatedAt
    paranoid: true,     // Enables soft deletes with deletedAt
  });

  return Role;
};
