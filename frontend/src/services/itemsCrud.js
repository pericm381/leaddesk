import axiosInstance from '../api/axios';

export const getItems = async () => {
  try {
    const response = await axiosInstance.get('/items');
    return response.data.data;
  } catch (error) {
    console.error('Failed to fetch items:', error);
    throw error;
  }
};

export const deleteItem = async (itemID) => {
  try {
    const response = await axiosInstance.delete(`/items/${itemID}`);
    return response.data;
  } catch (error) {
    console.error('Failed to fetch items:', error);
    throw error;
  }
};

export const createItem = async (name, amount) => {
  try {
    const response = await axiosInstance.post('/items', name, amount);
    return response.data;
  } catch (error) {
    console.error('Failed to create item:', error);
    throw error;
  }
};
