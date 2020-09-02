from django.urls import path
from .views import my_logout
from .views import home

urlpatterns = [
    path('',home, name='home'),
    path('logout/', my_logout, name='logout'),

]