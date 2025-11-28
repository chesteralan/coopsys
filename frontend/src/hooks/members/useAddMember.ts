import { createMember, CreateMemberPayload } from "@/services/member";
import { z } from "zod";
import {
  useMemberCivilStatus,
  useMemberDateOfBirth,
  useMemberFirstName,
  useMemberGender,
  useMemberLastName,
  useMemberMiddleName,
  useMemberPlaceOfBirth,
  useMemberReligion,
} from "@/stores/memberStore/memberStore";
import { useNavigate } from "react-router";

export const useAddMember = () => {
const firstName = useMemberFirstName();
  const lastName = useMemberLastName();
  const middleName = useMemberMiddleName();
  const dateOfBirth = useMemberDateOfBirth();
  const placeOfBirth = useMemberPlaceOfBirth();
  const religion = useMemberReligion();
  const gender = useMemberGender();
  const civilStatus = useMemberCivilStatus();
  const navigate = useNavigate();

  const memberSchema = z.object({
    first_name: z.string().min(1, "First name is required"),
    last_name: z.string().min(1, "Last name is required"),
    middle_name: z.string().optional(),
    date_of_birth: z.string().min(1, "Date of birth is required"),
    place_of_birth: z.string().optional(),
    religion: z.string().optional(),
    gender: z.string().min(1, "Gender is required"),
    civil_status: z.string().min(1, "Civil status is required"),
  });

  return async () => {
    const payload: CreateMemberPayload = {
      first_name: firstName,
      last_name: lastName,
      middle_name: middleName,
      date_of_birth: dateOfBirth,
      place_of_birth: placeOfBirth,
      religion,
      gender,
      civil_status: civilStatus,
    };
    const validation = memberSchema.safeParse(payload);
    if (!validation.success) {
      throw validation.error;
    }
    const response = await createMember(payload);
    navigate(`/members/update/${response.data.member_id}`);
    return response;
  };
};
